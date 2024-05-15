<?php
/* --------------------------------------------------------------
   ModulesDetailsMapperTest.inc.php 2018-08-01
   Gambio GmbH
   http://www.gambio.de
   Copyright (c) 2018 Gambio GmbH
   Released under the GNU General Public License (Version 2)
   [http://www.gnu.org/licenses/gpl-2.0.html]
   --------------------------------------------------------------
*/

use Gambio\AdminFeed\Services\ShopInformation\Collections\ModuleDetailsCollection;
use Gambio\AdminFeed\Services\ShopInformation\Mapper\ModulesDetailsMapper;
use Gambio\AdminFeed\Services\ShopInformation\Reader\ModulesDetailsReader;
use Gambio\AdminFeed\Services\ShopInformation\ValueObjects\ModuleDetails;
use Gambio\AdminFeed\Services\ShopInformation\ValueObjects\ModulesDetails;
use PHPUnit\Framework\TestCase;

/**
 * Class ModulesDetailsMapperTest
 */
class ModulesDetailsMapperTest extends TestCase
{
	/**
	 * @var \Gambio\AdminFeed\Services\ShopInformation\Collections\ModuleDetailsCollection
	 */
	private $hubData = [
		'dhl' => [
			'installed' => true,
			'enabled'   => true,
		],
		'dpd' => [
			'installed' => true,
			'enabled'   => false,
		],
	];
	
	/**
	 * @var \Gambio\AdminFeed\Services\ShopInformation\Collections\ModuleDetailsCollection
	 */
	private $paymentData = [
		'cod'        => [
			'installed' => true,
			'enabled'   => true,
		],
		'moneyorder' => [
			'installed' => true,
			'enabled'   => false,
		],
	];
	
	/**
	 * @var \Gambio\AdminFeed\Services\ShopInformation\Collections\ModuleDetailsCollection
	 */
	private $shippingData = [
		'dhl' => [
			'installed' => true,
			'enabled'   => true,
		],
		'dpd' => [
			'installed' => true,
			'enabled'   => false,
		],
	];
	
	/**
	 * @var \Gambio\AdminFeed\Services\ShopInformation\Collections\ModuleDetailsCollection
	 */
	private $orderTotalData = [
		'ot_shipping' => [
			'installed' => true,
			'enabled'   => true,
		],
		'ot_total'    => [
			'installed' => true,
			'enabled'   => false,
		],
	];
	
	/**
	 * @var \Gambio\AdminFeed\Services\ShopInformation\Collections\ModuleDetailsCollection
	 */
	private $moduleCenterData = [
		'MainModule'          => [
			'installed' => true,
			'enabled'   => null,
		],
		'UserModule'          => [
			'installed' => false,
			'enabled'   => null,
		],
		'GXModulesModule'     => [
			'installed' => true,
			'enabled'   => null,
		],
		'GXModulesJsonModule' => [
			'installed' => false,
			'enabled'   => null,
		],
	];
	
	
	/**
	 * @var \Gambio\AdminFeed\Services\ShopInformation\Reader\ModulesDetailsReader
	 */
	private $reader;
	
	/**
	 * @var \Gambio\AdminFeed\Services\ShopInformation\Mapper\ModulesDetailsMapper
	 */
	private $mapper;
	
	
	#[\Override]
 public function setUp()
	{
		$this->reader = $this->mockReader();
		
		$this->mapper = new ModulesDetailsMapper($this->reader);
	}
	
	
	/**
	 * @test
	 */
	public function shouldReturnExpectedMerchantDetailsDetails(): void
	{
		$expectedDetails = $this->expectedModulesDetails();
		
		$this->assertEquals($this->mapper->getModulesDetails(), $expectedDetails);
	}
	
	
	private function expectedModulesDetails()
	{
		$hubModules          = $this->mockModuleDetailsCollection($this->hubData);
		$paymentModules      = $this->mockModuleDetailsCollection($this->paymentData);
		$shippingModules     = $this->mockModuleDetailsCollection($this->shippingData);
		$orderTotalModules   = $this->mockModuleDetailsCollection($this->orderTotalData);
		$moduleCenterModules = $this->mockModuleDetailsCollection($this->moduleCenterData);
		
		return ModulesDetails::create($hubModules, $paymentModules, $shippingModules, $orderTotalModules,
		                              $moduleCenterModules);
	}
	
	
	private function mockModuleDetailsCollection($modulesData)
	{
		$collection = new ModuleDetailsCollection();
		foreach($modulesData as $moduleName => $moduleData)
		{
			$collection->add(new ModuleDetails($moduleName, $moduleData['installed'], $moduleData['enabled']));
		}
		
		return $collection;
	}
	
	
	private function mockReader()
	{
		$reader = $this->createMock(ModulesDetailsReader::class);
		$reader->method('getHubModulesData')->willReturn($this->hubData);
		$reader->method('getPaymentModulesData')->willReturn($this->paymentData);
		$reader->method('getShippingModulesData')->willReturn($this->shippingData);
		$reader->method('getOrderTotalModulesData')->willReturn($this->orderTotalData);
		$reader->method('getModuleCenterModulesData')->willReturn($this->moduleCenterData);
		
		return $reader;
	}
}