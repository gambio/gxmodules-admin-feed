<?php
/* --------------------------------------------------------------
   ShopInformationServiceFactoryTest.inc.php 2018-08-01
   Gambio GmbH
   http://www.gambio.de
   Copyright (c) 2018 Gambio GmbH
   Released under the GNU General Public License (Version 2)
   [http://www.gnu.org/licenses/gpl-2.0.html]
   --------------------------------------------------------------
*/

use Gambio\AdminFeed\Adapters\GxAdapter;
use Gambio\AdminFeed\Services\ShopInformation\ShopInformationService;
use Gambio\AdminFeed\Services\ShopInformation\ShopInformationServiceFactory;
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
	 * @var \Gambio\AdminFeed\Services\ShopInformation\ShopInformationServiceFactory
	 */
	private $factory;
	
	
	public function setUp(): void
	{
		$this->db = static::getCiDbQueryBuilder();
		
		$this->factory = new ShopInformationServiceFactory();
		$this->factory->setGxAdapter($this->mockGxAdapter());
	}
	
	
	/**
	 * @test
	 */
	public function shouldCreateAShopInformationService()
	{
		$this->assertInstanceOf(ShopInformationService::class, $this->factory->createService());
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
	
	
	public static function setUpBeforeClass()
	{
		static::exportDatabase(__DIR__ . '/backup.sql', ['configuration']);
	}
	
	
	public static function tearDownAfterClass()
	{
		self::importDatabase(__DIR__ . '/backup.sql', true);
	}
}