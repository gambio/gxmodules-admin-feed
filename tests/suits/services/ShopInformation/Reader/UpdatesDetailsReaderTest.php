<?php
/* --------------------------------------------------------------
   UpdatesDetailsReaderTest.inc.php 2018-08-01
   Gambio GmbH
   http://www.gambio.de
   Copyright (c) 2018 Gambio GmbH
   Released under the GNU General Public License (Version 2)
   [http://www.gnu.org/licenses/gpl-2.0.html]
   --------------------------------------------------------------
*/

use Gambio\AdminFeed\Adapters\GxAdapter;
use Gambio\AdminFeed\Services\ShopInformation\Reader\UpdatesDetailsReader;
use Gambio\AdminFeed\Tests\DbTestCase;
use Gambio\AdminFeed\Tests\GxMockInterfaces\DataCacheInterface;

/**
 * Class UpdatesDetailsReaderTest
 */
class UpdatesDetailsReaderTest extends DbTestCase
{
	/**
	 * @var \CI_DB_query_builder
	 */
	private $db;
	
	/**
	 * @var \Gambio\AdminFeed\Services\ShopInformation\Reader\UpdatesDetailsReader
	 */
	private $reader;
	
	
	#[\Override]
 public function setUp(): void
	{
		parent::setUp();
		
		$this->db = static::getCiDbQueryBuilder();
		
		$this->reader = new UpdatesDetailsReader($this->db);
	}
	
	
	/**
	 * @test
	 */
	public function shouldReturnExpectedInstalledUpdatesData(): void
	{
		$expectedData = include __DIR__ . '/fixtures/update_details/expected_installed_updates.php';
		$actualData   = $this->reader->getInstalledUpdatesData();
		
		$this->assertSame($expectedData, $actualData);
	}
	
	
	/**
	 * @test
	 */
	public function shouldReturnExpectedDownloadedUpdatesData(): void
	{
		$this->reader->setGxAdapter($this->mochGxAdpater());
		
		$expectedData = include __DIR__ . '/fixtures/update_details/expected_downloaded_updates.php';
		$actualData   = $this->reader->getDownloadedUpdatesData();
		
		$this->assertSame($expectedData, $actualData);
	}
	
	
	private function mochGxAdpater()
	{
		$updatesData = [
			[
				'name'        => 'Ovisto',
				'date'        => '2018-08-08',
				'receiptFile' => 'ovisto-2_0_0.php',
				'version'     => 'v2.0.0',
			],
		];
		
		$dataCache = $this->createMock(DataCacheInterface::class);
		$dataCache->method('key_exists')->with($this->equalTo('auto-updater'), $this->equalTo(true))->willReturn(true);
		$dataCache->method('get_data')
		          ->with($this->equalTo('auto-updater'), $this->equalTo(true))
		          ->willReturn($updatesData);
		
		$gxAdapter = $this->createMock(GxAdapter::class);
		$gxAdapter->method('getDataCache')->willReturn($dataCache);
		
		return $gxAdapter;
	}
	
	
	protected function getDataSet()
	{
		return $this->createArrayDataSet(include __DIR__ . '/fixtures/update_details/initial_dataset.php');
	}
	
	
	#[\Override]
 public static function setUpBeforeClass()
	{
		static::exportDatabase(__DIR__ . '/backup.sql', ['version_history']);
	}
	
	
	#[\Override]
 public static function tearDownAfterClass()
	{
		self::importDatabase(__DIR__ . '/backup.sql', true);
	}
}