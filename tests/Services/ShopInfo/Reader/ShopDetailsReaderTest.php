<?php
/* --------------------------------------------------------------
   ShopDetailsReaderTest.inc.php 2018-08-01
   Gambio GmbH
   http://www.gambio.de
   Copyright (c) 2018 Gambio GmbH
   Released under the GNU General Public License (Version 2)
   [http://www.gnu.org/licenses/gpl-2.0.html]
   --------------------------------------------------------------
*/

use Gambio\AdminFeed\Services\ShopInformation\Reader\ShopDetailsReader;
use Gambio\AdminFeed\Services\ShopInformation\Settings;
use Gambio\AdminFeed\Tests\DbTestCase;
use PHPUnit\Framework\TestCase;

/**
 * Class ShopDetailsReaderTest
 */
class ShopDetailsReaderTest extends DbTestCase
{
	/**
	 * @var \Gambio\AdminFeed\Services\ShopInformation\Settings|\PHPUnit\Framework\MockObject\MockObject
	 */
	private $settings;
	
	/**
	 * @var \CI_DB_query_builder
	 */
	private $db;
	
	/**
	 * @var \Gambio\AdminFeed\Services\ShopInformation\Reader\ShopDetailsReader
	 */
	private $reader;
	
	
	public function setUp(): void
	{
		parent::setUp();
		
		$this->settings = $this->createMock(Settings::class);
		$this->settings->method('getBaseDirectory')->willReturn(__DIR__ . '/fixtures/shop_details/shop_files/');
		$this->settings->method('getHttpServer')->willReturn('https://example.org');
		$this->settings->method('getShopDirectory')->willReturn('/shop/');
		$this->settings->method('getShopKey')->willReturn('1234-5678-9012-3456-7890');
		$this->settings->method('getDefaultLanguage')->willReturn('de');
		
		$this->db = static::getCiDbQueryBuilder();
		
		$this->reader = new ShopDetailsReader($this->settings, $this->db);
	}
	
	
	/**
	 * @test
	 */
	public function shouldReturnExpectedVersionData()
	{
		$expectedData = '3.10.0.0';
		$actualData   = $this->reader->getVersion();
		
		$this->assertEquals($expectedData, $actualData);
	}
	
	
	/**
	 * @test
	 */
	public function shouldReturnExpectedUrlData()
	{
		$expectedData = 'https://example.org/shop/';
		$actualData   = $this->reader->getUrl();
		
		$this->assertEquals($expectedData, $actualData);
	}
	
	
	/**
	 * @test
	 */
	public function shouldReturnExpectedKeyData()
	{
		$expectedData = '1234-5678-9012-3456-7890';
		$actualData   = $this->reader->getKey();
		
		$this->assertEquals($expectedData, $actualData);
	}
	
	
	/**
	 * @test
	 */
	public function shouldReturnExpectedLanguagesData()
	{
		$expectedData = ['de', 'en'];
		$actualData   = $this->reader->getLanguages();
		
		$this->assertEquals($expectedData, $actualData);
	}
	
	
	/**
	 * @test
	 */
	public function shouldReturnExpectedDefaultLanguageData()
	{
		$expectedData = 'de';
		$actualData   = $this->reader->getDefaultLanguage();
		
		$this->assertEquals($expectedData, $actualData);
	}
	
	
	/**
	 * @test
	 */
	public function shouldReturnExpectedCountriesData()
	{
		$expectedData = ['AT', 'CH', 'DE'];
		$actualData   = $this->reader->getCountries();
		
		$this->assertEquals($expectedData, $actualData);
	}
	
	
	/**
	 * @test
	 */
	public function shouldReturnExpectedNameData()
	{
		$expectedData = 'Mein Test-Shop';
		$actualData   = $this->reader->getName();
		
		$this->assertEquals($expectedData, $actualData);
	}
	
	
	/**
	 * @test
	 */
	public function shouldReturnExpectedOwnerData()
	{
		$expectedData = 'Testshop GmbH';
		$actualData   = $this->reader->getOwner();
		
		$this->assertEquals($expectedData, $actualData);
	}
	
	
	protected function getDataSet()
	{
		return $this->createArrayDataSet(include __DIR__ . '/fixtures/shop_details/initial_dataset.php');
	}
	
	
	public static function setUpBeforeClass()
	{
		static::exportDatabase(__DIR__ . '/backup.sql', ['countries', 'configuration', 'languages']);
	}
	
	
	public static function tearDownAfterClass()
	{
		self::importDatabase(__DIR__ . '/backup.sql', true);
	}
}