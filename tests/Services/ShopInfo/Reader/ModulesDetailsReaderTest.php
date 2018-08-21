<?php
/* --------------------------------------------------------------
   ModulesDetailsReaderTest.inc.php 2018-08-01
   Gambio GmbH
   http://www.gambio.de
   Copyright (c) 2018 Gambio GmbH
   Released under the GNU General Public License (Version 2)
   [http://www.gnu.org/licenses/gpl-2.0.html]
   --------------------------------------------------------------
*/

use Gambio\AdminFeed\Adapters\GxAdapter;
use Gambio\AdminFeed\Services\ShopInformation\HubClient;
use Gambio\AdminFeed\Services\ShopInformation\Reader\ModulesDetailsReader;
use Gambio\AdminFeed\Services\ShopInformation\Settings;
use Gambio\AdminFeed\Tests\DbTestCase;
use Gambio\AdminFeed\Tests\GxMockInterfaces\ModuleCenterModuleInterface;

/**
 * Class ModulesDetailsReaderTest
 */
class ModulesDetailsReaderTest extends DbTestCase
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
	 * @var \Gambio\AdminFeed\Services\ShopInformation\Reader\ModulesDetailsReader
	 */
	private $reader;
	
	/**
	 * @var \Gambio\AdminFeed\Services\ShopInformation\HubClient
	 */
	private $hubClient;
	
	
	public function setUp(): void
	{
		parent::setUp();
		
		$this->settings = $this->createMock(Settings::class);
		$this->settings->method('getBaseDirectory')->willReturn(__DIR__ . '/fixtures/modules_details/shop_files/');
		
		$this->db = static::getCiDbQueryBuilder();
		
		$this->hubClient = $this->createMock(HubClient::class);
		$this->hubClient->method('getHubModulesData')->willReturn([
			                                                          [
				                                                          'code'        => 'MoneyOrderHub',
				                                                          'isInstalled' => true,
				                                                          'isActive'    => true,
			                                                          ],
			                                                          [
				                                                          'code'        => 'CashHub',
				                                                          'isInstalled' => true,
				                                                          'isActive'    => false,
			                                                          ],
			                                                          [
				                                                          'code'        => 'InvoiceHub',
				                                                          'isInstalled' => false,
				                                                          'isActive'    => false,
			                                                          ],
		                                                          ]);
		
		$this->reader = new ModulesDetailsReader($this->settings, $this->db, $this->hubClient);
	}
	
	
	/**
	 * @test
	 */
	public function shouldReturnExpectedHubModulesData()
	{
		$expectedData = [
			'MoneyOrderHub' => [
				'installed' => true,
				'enabled'   => true,
			],
			'CashHub'       => [
				'installed' => true,
				'enabled'   => false,
			],
			'InvoiceHub'    => [
				'installed' => false,
				'enabled'   => false,
			],
		];
		$actualData   = $this->reader->getHubModulesData();
		
		$this->assertSame($expectedData, $actualData);
	}
	
	
	/**
	 * @test
	 */
	public function shouldReturnExpectedPaymentModulesData()
	{
		$expectedData = include __DIR__ . '/fixtures/modules_details/expected_payment_modules.php';
		$actualData   = $this->reader->getPaymentModulesData();
		
		$this->assertSame($expectedData, $actualData);
	}
	
	
	/**
	 * @test
	 */
	public function shouldReturnExpectedShippingModulesData()
	{
		$expectedData = include __DIR__ . '/fixtures/modules_details/expected_shipping_modules.php';
		$actualData   = $this->reader->getShippingModulesData();
		
		$this->assertSame($expectedData, $actualData);
	}
	
	
	/**
	 * @test
	 */
	public function shouldReturnExpectedOrderTotalModulesData()
	{
		$expectedData = include __DIR__ . '/fixtures/modules_details/expected_order_total_modules.php';
		$actualData   = $this->reader->getOrderTotalModulesData();
		
		$this->assertSame($expectedData, $actualData);
	}
	
	
	/**
	 * @test
	 */
	public function shouldReturnExpectedModuleCenterModulesData()
	{
		$this->reader->setGxAdapter($this->mockGxAdapter());
		
		$expectedData = include __DIR__ . '/fixtures/modules_details/expected_module_center_modules.php';
		$actualData   = $this->reader->getModuleCenterModulesData();
		
		$this->assertSame($expectedData, $actualData);
	}
	
	
	private function mockGxAdapter()
	{
		$db            = $this->createMock(stdClass::class);
		$textManager   = $this->createMock(stdClass::class);
		$cacheControl  = $this->createMock(stdClass::class);
		$mockedModules = $this->mockModuleCenterModules();
		
		$adapter = $this->createMock(GxAdapter::class);
		$adapter->method('getGxModulesFiles')->willReturn([
			                                                  'GXModules/test/GXModulesJsonModule/GXModule.json',
			                                                  'GXModules/test/someModule/Admin/Classes/GXModulesModuleModuleCenterModule.inc.php',
		                                                  ]);
		$adapter->method('getQueryBuilder')->willReturn($db);
		$adapter->method('mainFactoryCreateObject')->with('CacheControl')->willReturn($cacheControl);
		$adapter->method('mainFactoryCreate')
		        ->withConsecutive(['LanguageTextManager', 'module_center_module'], [
			        'MainModuleModuleCenterModule',
			        $textManager,
			        $db,
			        $cacheControl
		        ], [
			                          'UserModuleModuleCenterModule',
			                          $textManager,
			                          $db,
			                          $cacheControl
		                          ], [
			                          'GXModulesModuleModuleCenterModule',
			                          $textManager,
			                          $db,
			                          $cacheControl
		                          ], [
			                          'GXModuleCenterModule',
			                          $textManager,
			                          $db,
			                          $cacheControl
		                          ])
		        ->willReturnOnConsecutiveCalls($textManager, $mockedModules['mainModule'], $mockedModules['userModule'],
		                                       $mockedModules['gxModuleModule'], $mockedModules['gxModulesJsonModule']);
		
		return $adapter;
	}
	
	
	private function mockModuleCenterModules()
	{
		$mainModule = $this->createMock(ModuleCenterModuleInterface::class);
		$mainModule->method('getName')->willReturn('MainModule');
		$mainModule->method('isInstalled')->willReturn(true);
		
		$userModule = $this->createMock(ModuleCenterModuleInterface::class);
		$userModule->method('getName')->willReturn('UserModule');
		$userModule->method('isInstalled')->willReturn(false);
		
		$gxModuleModule = $this->createMock(ModuleCenterModuleInterface::class);
		$gxModuleModule->method('getName')->willReturn('GXModulesModule');
		$gxModuleModule->method('isInstalled')->willReturn(true);
		
		$gxModulesJsonModule = $this->createMock(ModuleCenterModuleInterface::class);
		$gxModulesJsonModule->method('getName')->willReturn('GXModulesJsonModule');
		$gxModulesJsonModule->method('setName');
		$gxModulesJsonModule->method('isInstalled')->willReturn(false);
		
		return [
			'mainModule'          => $mainModule,
			'userModule'          => $userModule,
			'gxModuleModule'      => $gxModuleModule,
			'gxModulesJsonModule' => $gxModulesJsonModule,
		];
	}
	
	
	protected function getDataSet()
	{
		return $this->createArrayDataSet(include __DIR__ . '/fixtures/modules_details/initial_dataset.php');
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