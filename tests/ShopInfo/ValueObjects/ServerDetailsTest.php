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
	
	/**
	 * @var \Gambio\AdminFeed\Services\ShopInformation\ValueObjects\ServerDetails
	 */
	private $serverDetails;
	
	#
	# SETUP
	#
	
	public function setUp()
	{
		$this->php   = $this->createMock(PhpServerDetailsInterface::class);
		$this->mysql = $this->createMock(MysqlServerDetailsInterface::class);
		
		$this->serverDetails = ServerDetails::create($this->php, $this->mysql);
	}
	
	#
	# TESTS
	#
	
	public function testPhpServerDetailsAreAccessible()
	{
		$this->assertEquals($this->serverDetails->php(), $this->php,
		                    'Given and returned php server details are not equals.');
	}
	
	
	public function testMysqlServerDetailsAreAccessible()
	{
		$this->assertEquals($this->serverDetails->mysql(), $this->mysql,
		                    'Given and returned mysql server details are not equals.');
	}
}