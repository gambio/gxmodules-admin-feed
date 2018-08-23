<?php
/* --------------------------------------------------------------
   TokenReaderTest.inc.php 2018-08-01
   Gambio GmbH
   http://www.gambio.de
   Copyright (c) 2018 Gambio GmbH
   Released under the GNU General Public License (Version 2)
   [http://www.gnu.org/licenses/gpl-2.0.html]
   --------------------------------------------------------------
*/

use Gambio\AdminFeed\Adapters\GxAdapter;
use Gambio\AdminFeed\Services\ShopInformation\Reader\TokenReader;
use Gambio\AdminFeed\Services\ShopInformation\Settings;
use Gambio\AdminFeed\Tests\GxMockInterfaces\DataCacheInterface;
use PHPUnit\Framework\TestCase;

/**
 * Class TokenReaderTest
 */
class TokenReaderTest extends TestCase
{
	/**
	 * @var array
	 */
	private $tokensData;
	
	/**
	 * @var \Gambio\AdminFeed\Services\ShopInformation\Settings|\PHPUnit\Framework\MockObject\MockObject
	 */
	private $settings;
	
	/**
	 * @var \Gambio\AdminFeed\Services\ShopInformation\Reader\TokenReader
	 */
	private $reader;
	
	
	public function setUp()
	{
		$this->tokensData = [
			[
				'timestamp' => time(),
				'token'     => uniqid(),
			],
			[
				'timestamp' => time(),
				'token'     => uniqid(),
			],
		];
		
		$this->settings = $this->createMock(Settings::class);
		$this->settings->method('getTokenDataCacheKey')->willReturn('admin-feed-shop-information-tokens');
		
		$this->reader = new TokenReader($this->settings);
		$this->reader->setGxAdapter($this->mockGxAdapter());
	}
	
	
	/**
	 * @test
	 */
	public function shouldReturnExpectedTokensData()
	{
		$expectedData = $this->tokensData;
		$actualData   = $this->reader->getTokensData();
		
		$this->assertSame($expectedData, $actualData);
	}
	
	
	private function mockGxAdapter()
	{
		$dataCache = $this->createMock(DataCacheInterface::class);
		$dataCache->method('get_data')
		          ->with($this->equalTo('admin-feed-shop-information-tokens'), $this->equalTo(true))
		          ->willReturn($this->tokensData);
		
		$gxAdapter = $this->createMock(GxAdapter::class);
		$gxAdapter->method('getDataCache')->willReturn($dataCache);
		
		return $gxAdapter;
	}
}