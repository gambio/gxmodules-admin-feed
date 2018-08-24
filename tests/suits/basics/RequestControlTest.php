<?php
/* --------------------------------------------------------------
   RequestControlTest.inc.php 2018-08-01
   Gambio GmbH
   http://www.gambio.de
   Copyright (c) 2018 Gambio GmbH
   Released under the GNU General Public License (Version 2)
   [http://www.gnu.org/licenses/gpl-2.0.html]
   --------------------------------------------------------------
*/

use Gambio\AdminFeed\Adapters\GxAdapter;
use Gambio\AdminFeed\RequestControl;
use Gambio\AdminFeed\Tests\GxMockInterfaces\DataCacheInterface;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Response;
use PHPUnit\Framework\TestCase;
use Psr\Http\Message\StreamInterface;

/**
 * Class RequestControlTest
 */
class RequestControlTest extends TestCase
{
	/**
	 * @var array
	 */
	private $tokensData;
	
	/**
	 * @var \Gambio\AdminFeed\Tests\GxMockInterfaces\DataCacheInterface|\PHPUnit\Framework\MockObject\MockObject
	 */
	private $dataCache;
	
	/**
	 * @var \Gambio\AdminFeed\RequestControl
	 */
	private $requestControl;
	
	
	public function setUp()
	{
		$this->tokensData = [
			[
				'timestamp' => time() - 60 * 10, # 10 minutes in the past
				'token'     => uniqid(),
			],
			[
				'timestamp' => time(),
				'token'     => uniqid(),
			],
		];
		
		$responseBody = $this->createMock(StreamInterface::class);
		$responseBody->method('getContents')->willReturn('["123.456.78.90", "13.37.*"]');
		
		$response = $this->createMock(Response::class);
		$response->method('getStatusCode')->willReturn(200);
		$response->method('getBody')->willReturn($responseBody);
		
		$curl = $this->createMock(Client::class);
		$curl->method('request')->willReturn($response);
		
		$this->requestControl = new RequestControl($curl);
		$this->requestControl->setGxAdapter($this->mockGxAdapter());
	}
	
	
	/**
	 * @test
	 */
	public function shouldCreateDifferentRequestTokens()
	{
		$this->assertNotSame($this->requestControl->createRequestToken(), $this->requestControl->createRequestToken());
	}
	
	
	/**
	 * @test
	 */
	public function shouldStoreCreatedTokenByUsingDataCache()
	{
		$lowestPossibleTimestamp = time();
		$tokensDataCallback      = function ($tokensData) use ($lowestPossibleTimestamp) {
			if(!is_array($tokensData) || count($tokensData) === 0)
			{
				return false;
			}
			
			foreach($tokensData as $tokenData)
			{
				if(!isset($tokenData['timestamp']) || !isset($tokenData['token'])
				   || $tokenData['timestamp'] < $lowestPossibleTimestamp
				   || empty($tokenData['token']))
				{
					return false;
				}
			}
			
			return true;
		};
		
		$this->dataCache->expects($this->once())
		                ->method('add_data')
		                ->with($this->equalTo('admin-feed-request-tokens'), $this->callback($tokensDataCallback),
		                       $this->equalTo(true));
		
		$this->requestControl->createRequestToken();
	}
	
	
	/**
	 * @test
	 */
	public function shouldDeleteOldRequestTokensBeforeVerifyingAToken()
	{
		$newTokensData = $this->tokensData;
		unset($newTokensData[0]);
		
		$this->dataCache->expects($this->once())
		                ->method('set_data')
		                ->with($this->equalTo('admin-feed-request-tokens'), $this->equalTo($newTokensData),
		                       $this->equalTo(true));
		
		$this->requestControl->verifyRequestToken('');
	}
	
	
	/**
	 * @test
	 */
	public function shouldDeleteOldRequestTokensBeforeCreatingAToken()
	{
		$newTokensData = $this->tokensData;
		unset($newTokensData[0]);
		
		$this->dataCache->expects($this->once())
		                ->method('set_data')
		                ->with($this->equalTo('admin-feed-request-tokens'), $this->equalTo($newTokensData),
		                       $this->equalTo(true));
		
		$this->requestControl->createRequestToken();
	}
	
	
	/**
	 * @test
	 */
	public function shouldSuccessfullyVerifyAValidRequestIpWithout()
	{
		$this->assertTrue($this->requestControl->verifyRequestIp('123.456.78.90'));
	}
	
	
	/**
	 * @test
	 */
	public function shouldSuccessfullyVerifyAValidRequestIpWithWildcard()
	{
		$this->assertTrue($this->requestControl->verifyRequestIp('13.37.1.1'));
	}
	
	
	/**
	 * @test
	 */
	public function shouldFailToVerifyAnInvalidRequestIp()
	{
		$this->assertFalse($this->requestControl->verifyRequestIp('99.99.99.99'));
	}
	
	
	private function mockGxAdapter()
	{
		$this->dataCache = $this->createMock(DataCacheInterface::class);
		$this->dataCache->method('get_data')
		                ->with($this->equalTo('admin-feed-request-tokens'), $this->equalTo(true))
		                ->willReturn($this->tokensData);
		
		$gxAdapter = $this->createMock(GxAdapter::class);
		$gxAdapter->method('getDataCache')->willReturn($this->dataCache);
		
		return $gxAdapter;
	}
}