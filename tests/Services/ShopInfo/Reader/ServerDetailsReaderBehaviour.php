<?php
/* --------------------------------------------------------------
   ServerDetailsReaderBehaviour.inc.php 2018-08-01
   Gambio GmbH
   http://www.gambio.de
   Copyright (c) 2018 Gambio GmbH
   Released under the GNU General Public License (Version 2)
   [http://www.gnu.org/licenses/gpl-2.0.html]
   --------------------------------------------------------------
*/

use Gambio\AdminFeed\Services\ShopInformation\Reader\ServerDetailsReader;
use Gambio\AdminFeed\Tests\DbTestCase;
use PHPUnit\Framework\TestCase;

/**
 * Class ServerDetailsReaderBehaviour
 */
class ServerDetailsReaderBehaviour extends DbTestCase
{
	/**
	 * @var \CI_DB_query_builder
	 */
	private $db;
	
	/**
	 * @var \Gambio\AdminFeed\Services\ShopInformation\Reader\ServerDetailsReader
	 */
	private $reader;
	
	
	public function setUp(): void
	{
		parent::setUp();
		
		$this->db = static::getCiDbQueryBuilder();
		
		$this->reader = ServerDetailsReader::create($this->db);
	}
	
	
	/**
	 * @test
	 */
	public function shouldReturnExpectedPhpVersionData()
	{
		$expectedData = phpversion();
		$actualData   = $this->reader->getPhpVersion();
		
		$this->assertEquals($expectedData, $actualData);
	}
	
	
	/**
	 * @test
	 */
	public function shouldReturnExpectedPhpExtensionsData()
	{
		$expectedData = get_loaded_extensions();
		$actualData   = $this->reader->getPhpExtensions();
		
		$this->assertEquals($expectedData, $actualData);
	}
	
	
	/**
	 * @test
	 */
	public function shouldReturnExpectedPhpConfigurationData()
	{
		$expectedData = ini_get_all();
		$actualData   = $this->reader->getPhpConfiguration();
		
		$this->assertEquals($expectedData, $actualData);
	}
	
	
	/**
	 * @test
	 */
	public function shouldReturnExpectedMysqlVersionData()
	{
		$expectedData = $this->db->version();
		$actualData   = $this->reader->getMysqlVersion();
		
		$this->assertEquals($expectedData, $actualData);
	}
	
	
	/**
	 * @test
	 */
	public function shouldReturnExpectedMysqlEnginesData()
	{
		$expectedData = [];
		
		$engines = $this->db->query('SHOW ENGINES;')->result_array();
		foreach($engines as $engine)
		{
			$expectedData[] = $engine['Engine'];
		}
		
		$actualData = $this->reader->getMysqlEngines();
		
		$this->assertEquals($expectedData, $actualData);
	}
	
	
	/**
	 * @test
	 */
	public function shouldReturnExpectedMysqlDefaultEngineData()
	{
		$expectedData = '';
		
		$engines = $this->db->query('SHOW ENGINES;')->result_array();
		foreach($engines as $engine)
		{
			if($engine['Support'] === 'DEFAULT')
			{
				$expectedData = $engine['Engine'];
				break;
			}
		}
		
		$actualData = $this->reader->getMysqlDefaultEngine();
		
		$this->assertEquals($expectedData, $actualData);
	}
	
	
	/**
	 * @test
	 */
	public function shouldReturnExpectedWebserverData()
	{
		$expectedData = isset($_SERVER['SERVER_SOFTWARE']) ? $_SERVER['SERVER_SOFTWARE'] : '';
		$actualData   = $this->reader->getWebserver();
		
		$this->assertEquals($expectedData, $actualData);
	}
	
	
	/**
	 * @test
	 */
	public function shouldReturnExpectedOperatingSystemData()
	{
		$expectedData = defined('PHP_OS') ? PHP_OS : '';
		$actualData   = $this->reader->getOperatingSystem();
		
		$this->assertEquals($expectedData, $actualData);
	}
	
	
	protected function getDataSet()
	{
		return $this->createArrayDataSet([]);
	}
}