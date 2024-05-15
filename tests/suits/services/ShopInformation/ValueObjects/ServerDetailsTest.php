<?php
/* --------------------------------------------------------------
   ServerDetailsTest.inc.php 2018-08-01
   Gambio GmbH
   http://www.gambio.de
   Copyright (c) 2018 Gambio GmbH
   Released under the GNU General Public License (Version 2)
   [http://www.gnu.org/licenses/gpl-2.0.html]
   --------------------------------------------------------------
*/

use Gambio\AdminFeed\Services\ShopInformation\ValueObjects\MysqlServerDetails;
use Gambio\AdminFeed\Services\ShopInformation\ValueObjects\PhpServerDetails;
use Gambio\AdminFeed\Services\ShopInformation\ValueObjects\ServerDetails;
use PHPUnit\Framework\TestCase;

/**
 * Class ServerDetailsTest
 */
class ServerDetailsTest extends TestCase
{
	/**
	 * @var \Gambio\AdminFeed\Services\ShopInformation\ValueObjects\PhpServerDetails
	 */
	private $php;
	
	/**
	 * @var \Gambio\AdminFeed\Services\ShopInformation\ValueObjects\MysqlServerDetails
	 */
	private $mysql;
	
	/**
	 * @var \Gambio\AdminFeed\Services\ShopInformation\ValueObjects\MysqlServerDetails
	 */
	private $webserver = 'Apache';
	
	/**
	 * @var \Gambio\AdminFeed\Services\ShopInformation\ValueObjects\MysqlServerDetails
	 */
	private $os = 'Linux';
	
	
	/**
	 * @var \Gambio\AdminFeed\Services\ShopInformation\ValueObjects\ServerDetails
	 */
	private $serverDetails;
	
	
	#[\Override]
 public function setUp()
	{
		$this->php   = $this->createMock(PhpServerDetails::class);
		$this->mysql = $this->createMock(MysqlServerDetails::class);
		
		$this->serverDetails = ServerDetails::create($this->php, $this->mysql, $this->webserver, $this->os);
	}
	
	
	/**
	 * @test
	 */
	public function shouldReturnGivenPhpServerDetails(): void
	{
		$this->assertSame($this->serverDetails->php(), $this->php);
	}
	
	
	/**
	 * @test
	 */
	public function shouldReturnGivenMysqlServerDetails(): void
	{
		$this->assertSame($this->serverDetails->mysql(), $this->mysql);
	}
	
	
	/**
	 * @test
	 */
	public function shouldReturnGivenWebserver(): void
	{
		$this->assertSame($this->serverDetails->webserver(), $this->webserver);
	}
	
	
	/**
	 * @test
	 */
	public function shouldReturnGivenOperatingSystem(): void
	{
		$this->assertSame($this->serverDetails->os(), $this->os);
	}
}