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
	
	/**
	 * @var \Gambio\AdminFeed\Services\ShopInformation\ValueObjects\MysqlServerDetails
	 */
	private $mysqlServerDetails;
	
	#
	# SETUP
	#
	
	public function setUp()
	{
		$this->mysqlServerDetails = MysqlServerDetails::create($this->version);
	}
	
	#
	# TESTS
	#
	
	public function testVersionIsAccessible()
	{
		$this->assertEquals($this->mysqlServerDetails->version(), $this->version,
		                    'Given and returned versions are not equals.');
	}
}