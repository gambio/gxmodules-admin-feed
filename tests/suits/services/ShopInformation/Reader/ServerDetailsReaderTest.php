<?php
/* --------------------------------------------------------------
   ServerDetailsReaderTest.inc.php 2018-08-01
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
 * Class ServerDetailsReaderTest
 */
class ServerDetailsReaderTest extends DbTestCase
{
	/**
	 * @var \CI_DB_query_builder
	 */
	private $db;
	
	/**
	 * @var \Gambio\AdminFeed\Services\ShopInformation\Reader\ServerDetailsReader
	 */
	private $reader;
	
	
	#[\Override]
 public function setUp(): void
	{
		parent::setUp();
		
		$this->db = static::getCiDbQueryBuilder();
		
		$this->reader = new ServerDetailsReader($this->db);
	}
	
	
	/**
	 * @test
	 */
	public function shouldReturnExpectedPhpVersionData(): void
	{
		$expectedData = phpversion();
		$actualData   = $this->reader->getPhpVersion();
		
		$this->assertSame($expectedData, $actualData);
	}
	
	
	/**
	 * @test
	 */
	public function shouldReturnExpectedPhpExtensionsData(): void
	{
		$expectedData = get_loaded_extensions();
		$actualData   = $this->reader->getPhpExtensions();
		
		$this->assertSame($expectedData, $actualData);
	}
	
	
	/**
	 * @test
	 */
	public function shouldReturnExpectedPhpConfigurationData(): void
	{
		$expectedData = ini_get_all();
		$actualData   = $this->reader->getPhpConfiguration();
		
		$this->assertSame($expectedData, $actualData);
	}
	
	
	/**
	 * @test
	 */
	public function shouldReturnExpectedMysqlVersionData(): void
	{
		$expectedData = $this->db->version();
		$actualData   = $this->reader->getMysqlVersion();
		
		$this->assertSame($expectedData, $actualData);
	}
	
	
	/**
	 * @test
	 */
	public function shouldReturnExpectedMysqlEnginesData(): void
	{
		$expectedData = [];
		
		$engines = $this->db->query('SHOW ENGINES;')->result_array();
		foreach($engines as $engine)
		{
			$expectedData[] = $engine['Engine'];
		}
		
		$actualData = $this->reader->getMysqlEngines();
		
		$this->assertSame($expectedData, $actualData);
	}
	
	
	/**
	 * @test
	 */
	public function shouldReturnExpectedMysqlDefaultEngineData(): void
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
		
		$this->assertSame($expectedData, $actualData);
	}
	
	
	/**
	 * @test
	 */
	public function shouldReturnExpectedWebserverData(): void
	{
		$expectedData = $_SERVER['SERVER_SOFTWARE'] ?? '';
		$actualData   = $this->reader->getWebserver();
		
		$this->assertSame($expectedData, $actualData);
	}
	
	
	/**
	 * @test
	 */
	public function shouldReturnExpectedOperatingSystemData(): void
	{
		$expectedData = defined('PHP_OS') ? PHP_OS : '';
		$actualData   = $this->reader->getOperatingSystem();
		
		$this->assertSame($expectedData, $actualData);
	}
	
	
	protected function getDataSet()
	{
		return $this->createArrayDataSet([]);
	}
}