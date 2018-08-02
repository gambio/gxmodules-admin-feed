<?php
/* --------------------------------------------------------------
   ModuleDetailsTest.inc.php 2018-08-01
   Gambio GmbH
   http://www.gambio.de
   Copyright (c) 2018 Gambio GmbH
   Released under the GNU General Public License (Version 2)
   [http://www.gnu.org/licenses/gpl-2.0.html]
   --------------------------------------------------------------
*/

use Gambio\AdminFeed\Services\ShopInformation\ValueObjects\ModuleDetails;
use PHPUnit\Framework\TestCase;

/**
 * Class ModuleDetailsTest
 */
class ModuleDetailsTest extends TestCase
{
	/**
	 * @var string
	 */
	private $name = 'Some Module';
	
	/**
	 * @var bool
	 */
	private $installed = true;
	
	/**
	 * @var bool
	 */
	private $active = false;
	
	/**
	 * @var string
	 */
	private $version = 'v1.0.1';
	
	/**
	 * @var \Gambio\AdminFeed\Services\ShopInformation\ValueObjects\ModuleDetails
	 */
	private $moduleDetails;
	
	#
	# SETUP
	#
	
	public function setUp()
	{
		$this->moduleDetails = ModuleDetails::create($this->name, $this->installed, $this->active, $this->version);
	}
	
	#
	# TESTS
	#
	
	public function testNameIsAccessible()
	{
		$this->assertEquals($this->moduleDetails->name(), $this->name,
		                    'Given and returned module names are not equals.');
	}
	
	
	public function testInstalledFlagIsAccessible()
	{
		$this->assertEquals($this->moduleDetails->installed(), $this->installed,
		                    'Given and returned installed flags are not equals.');
	}
	
	
	public function testActiveFlagIsAccessible()
	{
		$this->assertEquals($this->moduleDetails->active(), $this->active,
		                    'Given and returned active flags are not equals.');
	}
	
	
	public function testVersionIsAccessible()
	{
		$this->assertEquals($this->moduleDetails->version(), $this->version,
		                    'Given and returned module versions are not equals.');
	}
}