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
	
	#
	# TESTS
	#
	
	public function testCreation()
	{
		$moduleDetails  = ModuleDetails::create($this->name, $this->installed, $this->active, $this->version);
		$moduleDetails2 = ModuleDetails::create($this->name, $this->installed, $this->active, $this->version);
		
		$this->assertNotSame($moduleDetails, $moduleDetails2, 'Created mysql module details are identical/the same.');
	}
	
	
	public function testReturnValues()
	{
		$moduleDetails = ModuleDetails::create($this->name, $this->installed, $this->active, $this->version);
		
		$this->assertName($moduleDetails, $this->name);
		$this->assertInstalledFlag($moduleDetails, $this->installed);
		$this->assertActiveFlag($moduleDetails, $this->active);
		$this->assertVersion($moduleDetails, $this->version);
	}
	
	#
	# ASSERTIONS
	#
	
	private function assertName(ModuleDetails $moduleDetails, $name)
	{
		$this->assertEquals($moduleDetails->name(), $name, 'Given and returned module names are not equals.');
	}
	
	
	private function assertInstalledFlag(ModuleDetails $moduleDetails, $installed)
	{
		$this->assertEquals($moduleDetails->installed(), $installed,
		                    'Given and returned installed flags are not equals.');
	}
	
	
	private function assertActiveFlag(ModuleDetails $moduleDetails, $active)
	{
		$this->assertEquals($moduleDetails->active(), $active, 'Given and returned active flags are not equals.');
	}
	
	
	private function assertVersion(ModuleDetails $moduleDetails, $version)
	{
		$this->assertEquals($moduleDetails->version(), $version, 'Given and returned module versions are not equals.');
	}
}