<?php
/* --------------------------------------------------------------
   MysqlServerDetailsTest.inc.php 2018-08-01
   Gambio GmbH
   http://www.gambio.de
   Copyright (c) 2018 Gambio GmbH
   Released under the GNU General Public License (Version 2)
   [http://www.gnu.org/licenses/gpl-2.0.html]
   --------------------------------------------------------------
*/

use Gambio\AdminFeed\Services\ShopInformation\ValueObjects\MysqlServerDetails;
use PHPUnit\Framework\TestCase;

/**
 * Class MysqlServerDetailsTest
 */
class MysqlServerDetailsTest extends TestCase
{
	/**
	 * @var string
	 */
	private $version = 'v1.0.1';
	
	#
	# TESTS
	#
	
	public function testCreation()
	{
		$mysqlServerDetails  = MysqlServerDetails::create($this->version);
		$mysqlServerDetails2 = MysqlServerDetails::create($this->version);
		
		$this->assertNotSame($mysqlServerDetails, $mysqlServerDetails2,
		                     'Created mysql server details are identical/the same.');
	}
	
	
	public function testReturnValues()
	{
		$mysqlServerDetails = MysqlServerDetails::create($this->version);
		
		$this->assertVersion($mysqlServerDetails, $this->version);
	}
	
	#
	# ASSERTIONS
	#
	
	private function assertVersion(MysqlServerDetails $mysqlServerDetails, $version)
	{
		$this->assertEquals($mysqlServerDetails->version(), $version, 'Given and returned versions are not equals.');
	}
}