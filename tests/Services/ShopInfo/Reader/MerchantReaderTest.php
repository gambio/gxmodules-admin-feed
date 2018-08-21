<?php
/* --------------------------------------------------------------
   MerchantReaderTest.inc.php 2018-08-01
   Gambio GmbH
   http://www.gambio.de
   Copyright (c) 2018 Gambio GmbH
   Released under the GNU General Public License (Version 2)
   [http://www.gnu.org/licenses/gpl-2.0.html]
   --------------------------------------------------------------
*/

use Gambio\AdminFeed\Adapters\GxAdapter;
use Gambio\AdminFeed\Services\ShopInformation\Reader\MerchantDetailsReader;
use Gambio\AdminFeed\Tests\DbTestCase;
use Gambio\AdminFeed\Tests\GxMockInterfaces\LanguageTextManagerInterface;

/**
 * Class MerchantReaderTest
 */
class MerchantReaderTest extends DbTestCase
{
	/**
	 * @var \CI_DB_query_builder
	 */
	private $db;
	
	/**
	 * @var \Gambio\AdminFeed\Services\ShopInformation\Reader\MerchantDetailsReader
	 */
	private $reader;
	
	
	public function setUp(): void
	{
		parent::setUp();
		
		$this->db = static::getCiDbQueryBuilder();
		
		$this->reader = new MerchantDetailsReader($this->db);
	}
	
	
	/**
	 * @test
	 */
	public function shouldReturnExpectedCompanyData()
	{
		$expectedData = 'Gambio Testshop';
		$actualData   = $this->reader->getCompany();
		
		$this->assertSame($expectedData, $actualData);
	}
	
	
	/**
	 * @test
	 */
	public function shouldReturnExpectedFirstnameData()
	{
		$expectedData = 'John';
		$actualData   = $this->reader->getFirstname();
		
		$this->assertSame($expectedData, $actualData);
	}
	
	
	/**
	 * @test
	 */
	public function shouldReturnExpectedLastnameData()
	{
		$expectedData = 'Doe';
		$actualData   = $this->reader->getLastname();
		
		$this->assertSame($expectedData, $actualData);
	}
	
	
	/**
	 * @test
	 */
	public function shouldReturnExpectedStreetData()
	{
		$expectedData = 'Parallelweg';
		$actualData   = $this->reader->getStreet();
		
		$this->assertSame($expectedData, $actualData);
	}
	
	
	/**
	 * @test
	 */
	public function shouldReturnExpectedHouseNumberData()
	{
		$expectedData = '30';
		$actualData   = $this->reader->getHouseNumber();
		
		$this->assertSame($expectedData, $actualData);
	}
	
	
	/**
	 * @test
	 */
	public function shouldReturnExpectedPostalCodeData()
	{
		$expectedData = '28219';
		$actualData   = $this->reader->getPostalCode();
		
		$this->assertSame($expectedData, $actualData);
	}
	
	
	/**
	 * @test
	 */
	public function shouldReturnExpectedCityData()
	{
		$expectedData = 'Bremen';
		$actualData   = $this->reader->getCity();
		
		$this->assertSame($expectedData, $actualData);
	}
	
	
	/**
	 * @test
	 */
	public function shouldReturnExpectedStateData()
	{
		$expectedData = 'Bremen';
		$actualData   = $this->reader->getState();
		
		$this->assertSame($expectedData, $actualData);
	}
	
	
	/**
	 * @test
	 */
	public function shouldReturnExpectedCountryDataIfCountryCanBeTranslated()
	{
		$langTextManager = $this->createMock(LanguageTextManagerInterface::class);
		$langTextManager->method('get_text')->with('DE')->willReturn('Deutschland');
		$this->reader->setGxAdapter($this->mockGxAdapter($langTextManager));
		
		$expectedData = 'Deutschland';
		$actualData   = $this->reader->getCountry();
		
		$this->assertSame($expectedData, $actualData);
	}
	
	
	/**
	 * @test
	 */
	public function shouldReturnExpectedCountryDataIfCountryCanNotBeTranslated()
	{
		$langTextManager = $this->createMock(LanguageTextManagerInterface::class);
		$langTextManager->method('get_text')->with('DE')->willReturn('DE');
		$this->reader->setGxAdapter($this->mockGxAdapter($langTextManager));
		
		$expectedData = 'Germany';
		$actualData   = $this->reader->getCountry();
		
		$this->assertSame($expectedData, $actualData);
	}
	
	
	/**
	 * @test
	 */
	public function shouldReturnExpectedTelefonData()
	{
		$expectedData = '0421 - 22 34 678';
		$actualData   = $this->reader->getTelefon();
		
		$this->assertSame($expectedData, $actualData);
	}
	
	
	/**
	 * @test
	 */
	public function shouldReturnExpectedTelefaxData()
	{
		$expectedData = '0421 - 123456789';
		$actualData   = $this->reader->getTelefax();
		
		$this->assertSame($expectedData, $actualData);
	}
	
	
	/**
	 * @test
	 */
	public function shouldReturnExpectedEmailData()
	{
		$expectedData = 'admin@shop.de';
		$actualData   = $this->reader->getEmail();
		
		$this->assertSame($expectedData, $actualData);
	}
	
	
	private function mockGxAdapter($langTextManager)
	{
		$gxAdapter = $this->createMock(GxAdapter::class);
		$gxAdapter->method('mainFactoryCreateObject')
		          ->with('LanguageTextManager', ['countries', 2])
		          ->willReturn($langTextManager);
		$gxAdapter->method('getSessionValue')->with('languages_id')->willReturn(2);
		
		return $gxAdapter;
	}
	
	
	protected function getDataSet()
	{
		return $this->createArrayDataSet(include __DIR__ . '/fixtures/merchant_details/initial_dataset.php');
	}
	
	
	public static function setUpBeforeClass()
	{
		static::exportDatabase(__DIR__ . '/backup.sql', ['configuration']);
	}
	
	
	public static function tearDownAfterClass()
	{
		self::importDatabase(__DIR__ . '/backup.sql', true);
	}
}