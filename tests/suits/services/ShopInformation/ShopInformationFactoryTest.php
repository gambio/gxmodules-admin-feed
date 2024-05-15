<?php
/* --------------------------------------------------------------
   ShopInformationServiceFactoryTest.inc.php 2019-01-15
   Gambio GmbH
   http://www.gambio.de
   Copyright (c) 2019 Gambio GmbH
   Released under the GNU General Public License (Version 2)
   [http://www.gnu.org/licenses/gpl-2.0.html]
   --------------------------------------------------------------
*/

use Gambio\AdminFeed\Adapters\GxAdapter;
use Gambio\AdminFeed\Services\ShopInformation\Serializer\FileSystemDetailsSerializer;
use Gambio\AdminFeed\Services\ShopInformation\Serializer\MerchantAddressDetailsSerializer;
use Gambio\AdminFeed\Services\ShopInformation\Serializer\MerchantDetailsSerializer;
use Gambio\AdminFeed\Services\ShopInformation\Serializer\ModuleDetailsSerializer;
use Gambio\AdminFeed\Services\ShopInformation\Serializer\ModulesDetailsSerializer;
use Gambio\AdminFeed\Services\ShopInformation\Serializer\MysqlServerDetailsSerializer;
use Gambio\AdminFeed\Services\ShopInformation\Serializer\PhpServerDetailsSerializer;
use Gambio\AdminFeed\Services\ShopInformation\Serializer\ServerDetailsSerializer;
use Gambio\AdminFeed\Services\ShopInformation\Serializer\ShopDetailsSerializer;
use Gambio\AdminFeed\Services\ShopInformation\Serializer\ShopInformationSerializer;
use Gambio\AdminFeed\Services\ShopInformation\Serializer\ThemeDetailsSerializer;
use Gambio\AdminFeed\Services\ShopInformation\Serializer\UpdateDetailsSerializer;
use Gambio\AdminFeed\Services\ShopInformation\Serializer\UpdatesDetailsSerializer;
use Gambio\AdminFeed\Services\ShopInformation\ShopInformationFactory;
use Gambio\AdminFeed\Services\ShopInformation\ShopInformationService;
use Gambio\AdminFeed\Tests\DbTestCase;

/**
 * Class ShopInformationServiceFactoryTest
 */
class ShopInformationServiceFactoryTest extends DbTestCase
{
	/**
	 * @var \CI_DB_query_builder
	 */
	private $db;
	
	/**
	 * @var \Gambio\AdminFeed\Services\ShopInformation\ShopInformationFactory
	 */
	private $factory;
	
	
	#[\Override]
 public function setUp(): void
	{
		$this->db = static::getCiDbQueryBuilder();
		
		$this->factory = new ShopInformationFactory();
		$this->factory->setGxAdapter($this->mockGxAdapter());
	}
	
	
	/**
	 * @test
	 */
	public function shouldCreateAShopInformationService(): void
	{
		$this->assertInstanceOf(ShopInformationService::class, $this->factory->createService());
	}
	
	
	/**
	 * @test
	 */
	public function shouldCreateFileSystemDetailsSerializer(): void
	{
		$this->assertInstanceOf(FileSystemDetailsSerializer::class,
		                        $this->factory->createFileSystemDetailsSerializer());
	}
	
	
	/**
	 * @test
	 */
	public function shouldCreateModuleDetailsSerializer(): void
	{
		$this->assertInstanceOf(ModuleDetailsSerializer::class, $this->factory->createModuleDetailsSerializer());
	}
	
	
	/**
	 * @test
	 */
	public function shouldCreateModulesDetailsSerializer(): void
	{
		$this->assertInstanceOf(ModulesDetailsSerializer::class, $this->factory->createModulesDetailsSerializer());
	}
	
	
	/**
	 * @test
	 */
	public function shouldCreateMysqlServerDetailsSerializer(): void
	{
		$this->assertInstanceOf(MysqlServerDetailsSerializer::class,
		                        $this->factory->createMysqlServerDetailsSerializer());
	}
	
	
	/**
	 * @test
	 */
	public function shouldCreatePhpServerDetailsSerializer(): void
	{
		$this->assertInstanceOf(PhpServerDetailsSerializer::class, $this->factory->createPhpServerDetailsSerializer());
	}
	
	
	/**
	 * @test
	 */
	public function shouldCreateServerDetailsSerializer(): void
	{
		$this->assertInstanceOf(ServerDetailsSerializer::class, $this->factory->createServerDetailsSerializer());
	}
	
	
	/**
	 * @test
	 */
	public function shouldCreateShopDetailsSerializer(): void
	{
		$this->assertInstanceOf(ShopDetailsSerializer::class, $this->factory->createShopDetailsSerializer());
	}
	
	
	/**
	 * @test
	 */
	public function shouldCreateShopInformationSerializer(): void
	{
		$this->assertInstanceOf(ShopInformationSerializer::class, $this->factory->createShopInformationSerializer());
	}
	
	
	/**
	 * @test
	 */
	public function shouldCreateTemplateDetailsSerializer(): void
	{
		$this->assertInstanceOf(ThemeDetailsSerializer::class, $this->factory->createTemplateDetailsSerializer());
	}
	
	
	/**
	 * @test
	 */
	public function shouldCreateUpdateDetailsSerializer(): void
	{
		$this->assertInstanceOf(UpdateDetailsSerializer::class, $this->factory->createUpdateDetailsSerializer());
	}
	
	
	/**
	 * @test
	 */
	public function shouldCreateUpdatesDetailsSerializer(): void
	{
		$this->assertInstanceOf(UpdatesDetailsSerializer::class, $this->factory->createUpdatesDetailsSerializer());
	}
	
	
	private function mockGxAdapter()
	{
		$gxAdapter = $this->createMock(GxAdapter::class);
		$gxAdapter->method('getQueryBuilder')->willReturn($this->db);
		
		return $gxAdapter;
	}
	
	
	protected function getDataSet()
	{
		return $this->createArrayDataSet([]);
	}
	
	
	#[\Override]
 public static function setUpBeforeClass()
	{
		static::exportDatabase(__DIR__ . '/backup.sql', ['configuration']);
	}
	
	
	#[\Override]
 public static function tearDownAfterClass()
	{
		self::importDatabase(__DIR__ . '/backup.sql', true);
	}
}