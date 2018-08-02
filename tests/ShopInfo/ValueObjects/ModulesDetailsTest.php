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
	private $other;
	
	#
	# SETUP
	#
	
	public function setUp()
	{
		$this->payment    = $this->createMock(ModuleDetailsCollection::class);
		$this->shipping   = $this->createMock(ModuleDetailsCollection::class);
		$this->orderTotal = $this->createMock(ModuleDetailsCollection::class);
		$this->other      = $this->createMock(ModuleDetailsCollection::class);
	}
	
	#
	# TESTS
	#
	
	public function testCreation()
	{
		$modulesDetails  = ModulesDetails::create($this->payment, $this->shipping, $this->orderTotal, $this->other);
		$modulesDetails2 = ModulesDetails::create($this->payment, $this->shipping, $this->orderTotal, $this->other);
		
		$this->assertNotSame($modulesDetails, $modulesDetails2, 'Created modules details are identical/the same.');
	}
	
	
	public function testReturnValues()
	{
		$modulesDetails = ModulesDetails::create($this->payment, $this->shipping, $this->orderTotal, $this->other);
		
		$this->assertPaymentModules($modulesDetails, $this->payment);
		$this->assertShippingModules($modulesDetails, $this->shipping);
		$this->assertOrderTotalsModules($modulesDetails, $this->orderTotal);
		$this->assertOthersModules($modulesDetails, $this->other);
	}
	
	#
	# ASSERTIONS
	#
	
	private function assertPaymentModules(ModulesDetails $modulesDetails, ModuleDetailsCollection $payment)
	{
		$this->assertEquals($modulesDetails->payment(), $payment,
		                    'Given and returned payment modules collection are not equals.');
	}
	
	
	private function assertShippingModules(ModulesDetails $modulesDetails, ModuleDetailsCollection $shipping)
	{
		$this->assertEquals($modulesDetails->shipping(), $shipping,
		                    'Given and returned shipping modules collection are not equals.');
	}
	
	
	private function assertOrderTotalsModules(ModulesDetails $modulesDetails, ModuleDetailsCollection $orderTotal)
	{
		$this->assertEquals($modulesDetails->orderTotal(), $orderTotal,
		                    'Given and returned order totals modules collection are not equals.');
	}
	
	
	private function assertOthersModules(ModulesDetails $modulesDetails, ModuleDetailsCollection $other)
	{
		$this->assertEquals($modulesDetails->other(), $other,
		                    'Given and returned other modules collection are not equals.');
	}
}