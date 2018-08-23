<?php
/* --------------------------------------------------------------
   TokenWriterTest.inc.php 2018-08-01
   Gambio GmbH
   http://www.gambio.de
   Copyright (c) 2018 Gambio GmbH
   Released under the GNU General Public License (Version 2)
   [http://www.gnu.org/licenses/gpl-2.0.html]
   --------------------------------------------------------------
*/

use Gambio\AdminFeed\Adapters\GxAdapter;
use Gambio\AdminFeed\Services\ShopInformation\Writer\TokenWriter;
use Gambio\AdminFeed\Services\ShopInformation\Settings;
use Gambio\AdminFeed\Tests\GxMockInterfaces\DataCacheInterface;
use PHPUnit\Framework\TestCase;

/**
 * Class TokenWriterTest
 */
class TokenWriterTest extends TestCase
{
	/**
	 * @var int
	 */
	private $lowestPossibleTimestamp;
	
	/**
	 * @var array
	 */
	private $tokensData;
	
	/**
	 * @var \Gambio\AdminFeed\Tests\GxMockInterfaces\DataCacheInterface|\PHPUnit\Framework\MockObject\MockObject
	 */
	private $dataCache;
	
	/**
	 * @var \Gambio\AdminFeed\Services\ShopInformation\Settings|\PHPUnit\Framework\MockObject\MockObject
	 */
	private $settings;
	
	/**
	 * @var \Gambio\AdminFeed\Services\ShopInformation\Writer\TokenWriter
	 */
	private $writer;
	
	
	public function setUp()
	{
		$this->lowestPossibleTimestamp = time();
		$this->tokensData              = [
			[
				'timestamp' => time() - 60 * 10, # 10 minutes in the past
				'token'     => uniqid(),
			],
			[
				'timestamp' => time(),
				'token'     => uniqid(),
			],
		];
		
		$this->settings = $this->createMock(Settings::class);
		$this->settings->method('getTokenDataCacheKey')->willReturn('admin-feed-shop-information-tokens');
		$this->settings->method('getTokensLifespan')->willReturn(60 * 5);
		
		$this->writer = new TokenWriter($this->settings);
		$this->writer->setGxAdapter($this->mockGxAdapter());
	}
	
	
	/**
	 * @test
	 */
	public function shouldAddGivenTokenToTheDataCache()
	{
		$token = uniqid();
		$lowestPossibleTimestamp = $this->lowestPossibleTimestamp;
		$tokensDataCallback      = function ($tokensData) use ($token, $lowestPossibleTimestamp) {
			if(!is_array($tokensData) || count($tokensData) === 0)
			{
				return false;
			}
			
			foreach($tokensData as $tokenData)
			{
				if(!isset($tokenData['timestamp']) || !isset($tokenData['token'])
				   || $tokenData['timestamp'] < $lowestPossibleTimestamp
				   || $tokenData['token'] !== $token)
				{
					return false;
				}
			}
			
			return true;
		};
		
		$this->dataCache->expects($this->once())
		                ->method('add_data')
		                ->with($this->equalTo('admin-feed-shop-information-tokens'),
		                       $this->callback($tokensDataCallback), $this->equalTo(true));
		
		$this->writer->addToken($token);
	}
	
	
	/**
	 * @test
	 */
	public function shouldDeleteOldTokens()
	{
		$newTokensData = $this->tokensData;
		unset($newTokensData[0]);
		
		$this->dataCache->expects($this->once())
		                ->method('set_data')
		                ->with($this->equalTo('admin-feed-shop-information-tokens'), $this->identicalTo($newTokensData),
		                       $this->equalTo(true));
		
		$this->writer->deleteOldTokens();
	}
	
	
	private function mockGxAdapter()
	{
		$this->dataCache = $this->createMock(DataCacheInterface::class);
		$this->dataCache->method('get_data')
		                ->with($this->equalTo('admin-feed-shop-information-tokens'), $this->equalTo(true))
		                ->willReturn($this->tokensData);
		
		$gxAdapter = $this->createMock(GxAdapter::class);
		$gxAdapter->method('getDataCache')->willReturn($this->dataCache);
		
		return $gxAdapter;
	}
}