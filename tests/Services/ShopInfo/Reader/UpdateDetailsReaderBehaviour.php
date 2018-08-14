<?php
/* --------------------------------------------------------------
   UpdateDetailsReaderBehaviour.inc.php 2018-08-01
   Gambio GmbH
   http://www.gambio.de
   Copyright (c) 2018 Gambio GmbH
   Released under the GNU General Public License (Version 2)
   [http://www.gnu.org/licenses/gpl-2.0.html]
   --------------------------------------------------------------
*/

use Gambio\AdminFeed\Services\ShopInformation\Reader\UpdateDetailsReader;
use Gambio\AdminFeed\Tests\DbTestCase;

/**
 * Class UpdateDetailsReaderBehaviour
 */
class UpdateDetailsReaderBehaviour extends DbTestCase
{
	/**
	 * @var \CI_DB_query_builder
	 */
	private $db;
	
	/**
	 * @var \Gambio\AdminFeed\Services\ShopInformation\Reader\UpdateDetailsReader
	 */
	private $reader;
	
	
	public function setUp(): void
	{
		parent::setUp();
		
		$this->db = static::getCiDbQueryBuilder();
		
		$this->reader = UpdateDetailsReader::create($this->db);
	}
	
	
	/**
	 * @test
	 */
	public function shouldReturnExpectedInstalledUpdatesData()
	{
		$expectedData = include __DIR__ . '/fixtures/update_details/expected_installed_updates.php';
		$actualData   = $this->reader->getUpdates();
		
		$this->assertEquals($expectedData, $actualData);
	}
	
	
	protected function getDataSet()
	{
		return $this->createArrayDataSet(include __DIR__ . '/fixtures/update_details/initial_dataset.php');
	}
	
	
	public static function setUpBeforeClass()
	{
		static::exportDatabase(__DIR__ . '/backup.sql', ['version_history']);
	}
	
	
	public static function tearDownAfterClass()
	{
		self::importDatabase(__DIR__ . '/backup.sql', true);
	}
}