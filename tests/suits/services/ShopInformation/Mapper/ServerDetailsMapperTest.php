<?php
/* --------------------------------------------------------------
   ServerDetailsMapperTest.inc.php 2018-08-01
   Gambio GmbH
   http://www.gambio.de
   Copyright (c) 2018 Gambio GmbH
   Released under the GNU General Public License (Version 2)
   [http://www.gnu.org/licenses/gpl-2.0.html]
   --------------------------------------------------------------
*/

use Gambio\AdminFeed\Services\ShopInformation\Mapper\ServerDetailsMapper;
use Gambio\AdminFeed\Services\ShopInformation\Reader\ServerDetailsReader;
use Gambio\AdminFeed\Services\ShopInformation\ValueObjects\MysqlServerDetails;
use Gambio\AdminFeed\Services\ShopInformation\ValueObjects\PhpServerDetails;
use Gambio\AdminFeed\Services\ShopInformation\ValueObjects\ServerDetails;
use PHPUnit\Framework\TestCase;

/**
 * Class ServerDetailsMapperTest
 */
class ServerDetailsMapperTest extends TestCase
{
	/**
	 * @var string
	 */
	private $phpVersion = 'v1.0.1';
	
	/**
	 * @var array
	 */
	private $phpExtensions = ['curl', 'zip'];
	
	/**
	 * @var array
	 */
	private $phpConfiguration = ['max_execution_time' => 30];
	
	/**
	 * @var string
	 */
	private $mysqlVersion = 'v2.0.2';
	
	/**
	 * @var array
	 */
	private $mysqlEngines = ['MyISAM', 'InnoDB'];
	
	/**
	 * @var string
	 */
	private $mysqlDefaultEngine = 'InnoDB';
	
	/**
	 * @var string
	 */
	private $webserver = 'Apache';
	
	/**
	 * @var string
	 */
	private $os = 'Linux';
	
	
	/**
	 * @var \Gambio\AdminFeed\Services\ShopInformation\Reader\ServerDetailsReader
	 */
	private $reader;
	
	/**
	 * @var \Gambio\AdminFeed\Services\ShopInformation\Mapper\ServerDetailsMapper
	 */
	private $mapper;
	
	
	#[\Override]
 public function setUp()
	{
		$this->reader = $this->mockReader();
		
		$this->mapper = new ServerDetailsMapper($this->reader);
	}
	
	
	/**
	 * @test
	 */
	public function shouldReturnExpectedMerchantDetailsDetails(): void
	{
		$expectedDetails = $this->expectedServerDetails();
		
		$this->assertEquals($this->mapper->getServerDetails(), $expectedDetails);
	}
	
	
	private function expectedServerDetails()
	{
		$phpDetails   = new PhpServerDetails($this->phpVersion, $this->phpExtensions, $this->phpConfiguration);
		$mysqlDetails = new MysqlServerDetails($this->mysqlVersion, $this->mysqlEngines, $this->mysqlDefaultEngine);
		$webserver    = $this->webserver;
		$os           = $this->os;
		
		return new ServerDetails($phpDetails, $mysqlDetails, $webserver, $os);
	}
	
	
	private function mockReader()
	{
		$reader = $this->createMock(ServerDetailsReader::class);
		$reader->method('getPhpVersion')->willReturn($this->phpVersion);
		$reader->method('getPhpExtensions')->willReturn($this->phpExtensions);
		$reader->method('getPhpConfiguration')->willReturn($this->phpConfiguration);
		$reader->method('getMysqlVersion')->willReturn($this->mysqlVersion);
		$reader->method('getMysqlEngines')->willReturn($this->mysqlEngines);
		$reader->method('getMysqlDefaultEngine')->willReturn($this->mysqlDefaultEngine);
		$reader->method('getWebserver')->willReturn($this->webserver);
		$reader->method('getOperatingSystem')->willReturn($this->os);
		
		return $reader;
	}
}