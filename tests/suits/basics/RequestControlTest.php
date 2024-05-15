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
use Gambio\AdminFeed\CurlClient;
use Gambio\AdminFeed\RequestControl;
use Gambio\AdminFeed\Tests\GxMockInterfaces\DataCacheInterface;
use PHPUnit\Framework\TestCase;

/**
 * Class RequestControlTest
 */
class RequestControlTest extends TestCase
{
	/**
	 * @var string
	 */
	private $dataCacheKey = 'admin-feed-request-tokens';
	
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
	
	
	#[\Override]
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
		
		$curl = $this->createMock(CurlClient::class);
		$curl->method('getStatusCode')->willReturn(200);
		$curl->method('getContent')->willReturn('["123.456.78.90", "13.37.*"]');
		
		$this->requestControl = new RequestControl($curl);
		$this->requestControl->setGxAdapter($this->mockGxAdapter());
	}
	
	
	/**
	 * @test
	 */
	public function shouldCreateDifferentRequestTokens(): void
	{
		$this->assertNotSame($this->requestControl->createRequestToken(), $this->requestControl->createRequestToken());
	}
	
	
	/**
	 * @test
	 */
	public function shouldStoreCreatedTokenByUsingDataCacheIfDataCacheKeyAlreadyExists(): void
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
		
		$this->dataCache->method('key_exists')->with($this->equalTo($this->dataCacheKey))->willReturn(true);
		$this->dataCache->expects($this->once())
		                ->method('add_data')
		                ->with($this->equalTo($this->dataCacheKey), $this->callback($tokensDataCallback),
		                       $this->equalTo(true));
		
		$this->requestControl->createRequestToken();
	}
	
	
	/**
	 * @test
	 */
	public function shouldStoreCreatedTokenByUsingDataCacheIfDataCacheKeyDoesNotAlreadyExist(): void
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
		
		$this->dataCache->method('key_exists')->with($this->equalTo($this->dataCacheKey))->willReturn(false);
		$this->dataCache->expects($this->once())
		                ->method('set_data')
		                ->with($this->equalTo($this->dataCacheKey), $this->callback($tokensDataCallback),
		                       $this->equalTo(true));
		
		$this->requestControl->createRequestToken();
	}
	
	
	/**
	 * @test
	 */
	public function shouldDeleteOldRequestTokensBeforeVerifyingAToken(): void
	{
		$newTokensData = $this->tokensData;
		unset($newTokensData[0]);
		
		$this->dataCache->method('key_exists')->with($this->equalTo($this->dataCacheKey))->willReturn(true);
		$this->dataCache->expects($this->once())
		                ->method('set_data')
		                ->with($this->equalTo($this->dataCacheKey), $this->equalTo($newTokensData),
		                       $this->equalTo(true));
		
		$this->requestControl->verifyRequestToken('');
	}
	
	
	/**
	 * @test
	 */
	public function shouldDeleteOldRequestTokensBeforeCreatingAToken(): void
	{
		$newTokensData = $this->tokensData;
		unset($newTokensData[0]);
		
		$this->dataCache->method('key_exists')->with($this->equalTo($this->dataCacheKey))->willReturn(true);
		$this->dataCache->expects($this->once())
		                ->method('set_data')
		                ->with($this->equalTo($this->dataCacheKey), $this->equalTo($newTokensData),
		                       $this->equalTo(true));
		
		$this->requestControl->createRequestToken();
	}
	
	
	/**
	 * @test
	 */
	public function shouldSuccessfullyVerifyAValidRequestIpWithout(): void
	{
		$this->assertTrue($this->requestControl->verifyRequestIp('123.456.78.90'));
	}
	
	
	/**
	 * @test
	 */
	public function shouldSuccessfullyVerifyAValidRequestIpWithWildcard(): void
	{
		$this->assertTrue($this->requestControl->verifyRequestIp('13.37.1.1'));
	}
	
	
	/**
	 * @test
	 */
	public function shouldFailToVerifyAnInvalidRequestIp(): void
	{
		$this->assertFalse($this->requestControl->verifyRequestIp('99.99.99.99'));
	}
	
	
	private function mockGxAdapter()
	{
		$this->dataCache = $this->createMock(DataCacheInterface::class);
		$this->dataCache->method('get_data')
		                ->with($this->equalTo($this->dataCacheKey), $this->equalTo(true))
		                ->willReturn($this->tokensData);
		
		$gxAdapter = $this->createMock(GxAdapter::class);
		$gxAdapter->method('getDataCache')->willReturn($this->dataCache);
		
		return $gxAdapter;
	}
}