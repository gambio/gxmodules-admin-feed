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

use Gambio\AdminFeed\Services\ShopInformation\ValueObjects\Interfaces\MysqlServerDetailsInterface;
use Gambio\AdminFeed\Services\ShopInformation\ValueObjects\Interfaces\PhpServerDetailsInterface;
use Gambio\AdminFeed\Services\ShopInformation\ValueObjects\ServerDetails;
use PHPUnit\Framework\TestCase;

/**
 * Class ServerDetailsTest
 */
class ServerDetailsTest extends TestCase
{
	/**
	 * @var \Gambio\AdminFeed\Services\ShopInformation\ValueObjects\Interfaces\PhpServerDetailsInterface
	 */
	private $php;
	
	/**
	 * @var \Gambio\AdminFeed\Services\ShopInformation\ValueObjects\Interfaces\MysqlServerDetailsInterface
	 */
	private $mysql;
	
	#
	# SETUP
	#
	
	public function setUp()
	{
		$this->php   = $this->createMock(PhpServerDetailsInterface::class);
		$this->mysql = $this->createMock(MysqlServerDetailsInterface::class);
	}
	
	#
	# TESTS
	#
	
	public function testCreation()
	{
		$serverDetails  = ServerDetails::create($this->php, $this->mysql);
		$serverDetails2 = ServerDetails::create($this->php, $this->mysql);
		
		$this->assertNotSame($serverDetails, $serverDetails2, 'Created server details are identical/the same.');
	}
	
	
	public function testReturnValues()
	{
		$serverDetails = ServerDetails::create($this->php, $this->mysql);
		
		$this->assertPhpServerDetails($serverDetails, $this->php);
		$this->assertMysqlServerDetails($serverDetails, $this->mysql);
	}
	
	#
	# ASSERTIONS
	#
	
	private function assertPhpServerDetails(ServerDetails $serverDetails, PhpServerDetailsInterface $php)
	{
		$this->assertEquals($serverDetails->php(), $php, 'Given and returned php server details are not equals.');
	}
	
	
	private function assertMysqlServerDetails(ServerDetails $serverDetails, MysqlServerDetailsInterface $mysql)
	{
		$this->assertEquals($serverDetails->mysql(), $mysql, 'Given and returned mysql server details are not equals.');
	}
}