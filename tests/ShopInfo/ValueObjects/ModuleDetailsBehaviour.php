<?php
/* --------------------------------------------------------------
   ModuleDetailsBehaviour.inc.php 2018-08-01
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
 * Class ModuleDetailsBehaviour
 */
class ModuleDetailsBehaviour extends TestCase
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
	
	public function setUp()
	{
		$this->moduleDetails = ModuleDetails::create($this->name, $this->installed, $this->active);
	}
	
	
	/**
	 * @test
	 */
	public function shouldReturnGivenName()
	{
		$this->assertEquals($this->moduleDetails->name(), $this->name);
	}
	
	
	/**
	 * @test
	 */
	public function shouldReturnGivenInstalledFlag()
	{
		$this->assertEquals($this->moduleDetails->installed(), $this->installed);
	}
	
	
	/**
	 * @test
	 */
	public function shouldReturnGivenActiveFlag()
	{
		$this->assertEquals($this->moduleDetails->active(), $this->active);
	}
}