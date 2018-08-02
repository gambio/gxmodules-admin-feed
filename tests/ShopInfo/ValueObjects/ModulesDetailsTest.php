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
	
	/**
	 * @var \Gambio\AdminFeed\Services\ShopInformation\ValueObjects\ModulesDetails
	 */
	private $modulesDetails;
	
	#
	# SETUP
	#
	
	public function setUp()
	{
		$this->payment    = $this->createMock(ModuleDetailsCollection::class);
		$this->shipping   = $this->createMock(ModuleDetailsCollection::class);
		$this->orderTotal = $this->createMock(ModuleDetailsCollection::class);
		$this->other      = $this->createMock(ModuleDetailsCollection::class);
		
		$this->modulesDetails = ModulesDetails::create($this->payment, $this->shipping, $this->orderTotal,
		                                               $this->other);
	}
	
	#
	# TESTS
	#
	
	public function testPaymentModulesAreAccessible()
	{
		$this->assertEquals($this->modulesDetails->payment(), $this->payment,
		                    'Given and returned payment modules collection are not equals.');
	}
	
	
	public function testShippingModulesAreAccessible()
	{
		$this->assertEquals($this->modulesDetails->shipping(), $this->shipping,
		                    'Given and returned shipping modules collection are not equals.');
	}
	
	
	public function testOrderTotalsModulesAreAccessible()
	{
		$this->assertEquals($this->modulesDetails->orderTotal(), $this->orderTotal,
		                    'Given and returned order totals modules collection are not equals.');
	}
	
	
	public function testOthersModulesAreAccessible()
	{
		$this->assertEquals($this->modulesDetails->other(), $this->other,
		                    'Given and returned other modules collection are not equals.');
	}
}