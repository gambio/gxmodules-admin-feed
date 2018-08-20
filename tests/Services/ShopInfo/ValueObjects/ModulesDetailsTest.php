<?php
/* --------------------------------------------------------------
   ModulesDetailsTest.inc.php 2018-08-01
   Gambio GmbH
   http://www.gambio.de
   Copyright (c) 2018 Gambio GmbH
   Released under the GNU General Public License (Version 2)
   [http://www.gnu.org/licenses/gpl-2.0.html]
   --------------------------------------------------------------
*/

use Gambio\AdminFeed\Services\ShopInformation\Collections\ModuleDetailsCollection;
use Gambio\AdminFeed\Services\ShopInformation\ValueObjects\ModulesDetails;
use PHPUnit\Framework\TestCase;

/**
 * Class ModulesDetailsTest
 */
class ModulesDetailsTest extends TestCase
{
	/**
	 * @var \Gambio\AdminFeed\Services\ShopInformation\Collections\ModuleDetailsCollection
	 */
	private $payment;
	
	/**
	 * @var \Gambio\AdminFeed\Services\ShopInformation\Collections\ModuleDetailsCollection
	 */
	private $shipping;
	
	/**
	 * @var \Gambio\AdminFeed\Services\ShopInformation\Collections\ModuleDetailsCollection
	 */
	private $orderTotal;
	
	/**
	 * @var \Gambio\AdminFeed\Services\ShopInformation\Collections\ModuleDetailsCollection
	 */
	private $hub;
	
	/**
	 * @var \Gambio\AdminFeed\Services\ShopInformation\Collections\ModuleDetailsCollection
	 */
	private $moduleCenter;
	
	/**
	 * @var \Gambio\AdminFeed\Services\ShopInformation\ValueObjects\ModulesDetails
	 */
	private $modulesDetails;
	
	
	public function setUp()
	{
		$this->payment      = $this->createMock(ModuleDetailsCollection::class);
		$this->shipping     = $this->createMock(ModuleDetailsCollection::class);
		$this->orderTotal   = $this->createMock(ModuleDetailsCollection::class);
		$this->hub          = $this->createMock(ModuleDetailsCollection::class);
		$this->moduleCenter = $this->createMock(ModuleDetailsCollection::class);
		
		$this->modulesDetails = ModulesDetails::create($this->payment, $this->shipping, $this->orderTotal, $this->hub,
		                                               $this->moduleCenter);
	}
	
	
	/**
	 * @test
	 */
	public function shouldReturnGivenPaymentModules()
	{
		$this->assertEquals($this->modulesDetails->payment(), $this->payment);
	}
	
	
	/**
	 * @test
	 */
	public function shouldReturnGivenShippingModules()
	{
		$this->assertEquals($this->modulesDetails->shipping(), $this->shipping);
	}
	
	
	/**
	 * @test
	 */
	public function shouldReturnGivenOrderTotalsModules()
	{
		$this->assertEquals($this->modulesDetails->orderTotal(), $this->orderTotal);
	}
	
	
	/**
	 * @test
	 */
	public function shouldReturnGivenHubModules()
	{
		$this->assertEquals($this->modulesDetails->hub(), $this->hub);
	}
}