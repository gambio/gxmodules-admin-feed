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
	private $enabled = false;
	
	/**
	 * @var \Gambio\AdminFeed\Services\ShopInformation\ValueObjects\ModuleDetails
	 */
	private $moduleDetails;
	
	
	#[\Override]
 public function setUp()
	{
		$this->moduleDetails = ModuleDetails::create($this->name, $this->installed, $this->enabled);
	}
	
	
	/**
	 * @test
	 */
	public function shouldThrowInvalidArgumentExceptionIfGivenNameIsEmpty(): void
	{
		$this->expectException(\InvalidArgumentException::class);
		
		ModuleDetails::create('', $this->installed, $this->enabled);
	}
	
	
	/**
	 * @test
	 */
	public function shouldReturnGivenName(): void
	{
		$this->assertSame($this->moduleDetails->name(), $this->name);
	}
	
	
	/**
	 * @test
	 */
	public function shouldReturnGivenInstalledFlag(): void
	{
		$this->assertSame($this->moduleDetails->installed(), $this->installed);
	}
	
	
	/**
	 * @test
	 */
	public function shouldReturnGivenEnabledFlag(): void
	{
		$this->assertSame($this->moduleDetails->enabled(), $this->enabled);
	}
}