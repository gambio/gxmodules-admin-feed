<?php
/* --------------------------------------------------------------
   ModulesDetailsSerializer.php 2018-08-01
   Gambio GmbH
   http://www.gambio.de
   Copyright (c) 2018 Gambio GmbH
   Released under the GNU General Public License (Version 2)
   [http://www.gnu.org/licenses/gpl-2.0.html]
   --------------------------------------------------------------
*/

namespace Gambio\AdminFeed\Services\ShopInformation\Serializer;

use Gambio\AdminFeed\Services\ShopInformation\Collections\ModuleDetailsCollection;
use Gambio\AdminFeed\Services\ShopInformation\ValueObjects\ModulesDetails;

/**
 * Class ModulesDetailsSerializer
 *
 * @package Gambio\AdminFeed\Services\ShopInformation\Serializer
 */
class ModulesDetailsSerializer
{
	/**
	 * ModulesDetailsSerializer constructor.
	 *
	 * @param \Gambio\AdminFeed\Services\ShopInformation\Serializer\ModuleDetailsSerializer $moduleDetailsSerializer
	 */
	public function __construct(private readonly ModuleDetailsSerializer $moduleDetailsSerializer)
 {
 }
	
	
	/**
	 * Serializes a given ModulesDetails instance.
	 *
	 * @param \Gambio\AdminFeed\Services\ShopInformation\ValueObjects\ModulesDetails $modulesDetails
	 *
	 * @return array
	 */
	public function serialize(ModulesDetails $modulesDetails)
	{
		$hubData = [];
		foreach($modulesDetails->hub() as $module)
		{
			$hubData[] = $this->moduleDetailsSerializer->serialize($module);
		}
		
		$paymentData = [];
		foreach($modulesDetails->payment() as $module)
		{
			$paymentData[] = $this->moduleDetailsSerializer->serialize($module);
		}
		
		$shippingData = [];
		foreach($modulesDetails->shipping() as $module)
		{
			$shippingData[] = $this->moduleDetailsSerializer->serialize($module);
		}
		
		$orderTotalData = [];
		foreach($modulesDetails->orderTotal() as $module)
		{
			$orderTotalData[] = $this->moduleDetailsSerializer->serialize($module);
		}
		
		$moduleCenterData = [];
		foreach($modulesDetails->moduleCenter() as $module)
		{
			$moduleCenterData[] = $this->moduleDetailsSerializer->serialize($module);
		}
		
		$json = [
			'hub'          => $hubData,
			'payment'      => $paymentData,
			'shipping'     => $shippingData,
			'orderTotal'   => $orderTotalData,
			'moduleCenter' => $moduleCenterData,
		];
		
		return $json;
	}
	
	
	/**
	 * Returns a new ModulesDetails instance by using the data of a given array or json strings.
	 *
	 * @param string|array $json
	 *
	 * @return \Gambio\AdminFeed\Services\ShopInformation\ValueObjects\ModulesDetails
	 */
	public function deserialize($json)
	{
		if(!is_array($json))
		{
			$json = json_decode($json, true);
		}
		
		$neededProperties = [
			'hub',
			'payment',
			'shipping',
			'orderTotal',
			'moduleCenter',
		];
		foreach($neededProperties as $property)
		{
			if(!array_key_exists($property, $json))
			{
				throw new \InvalidArgumentException('Property "'.$property.'" is missing.');
			}
		}
		
		$hubModules = [];
		foreach($json['hub'] as $moduleData)
		{
			$hubModules[] = $this->moduleDetailsSerializer->deserialize($moduleData);
		}
		$hub = new ModuleDetailsCollection($hubModules);
		
		$paymentModules = [];
		foreach($json['payment'] as $moduleData)
		{
			$paymentModules[] = $this->moduleDetailsSerializer->deserialize($moduleData);
		}
		$payment = new ModuleDetailsCollection($paymentModules);
		
		$shippingModules = [];
		foreach($json['shipping'] as $moduleData)
		{
			$shippingModules[] = $this->moduleDetailsSerializer->deserialize($moduleData);
		}
		$shipping = new ModuleDetailsCollection($shippingModules);
		
		$orderTotalModules = [];
		foreach($json['orderTotal'] as $moduleData)
		{
			$orderTotalModules[] = $this->moduleDetailsSerializer->deserialize($moduleData);
		}
		$orderTotal = new ModuleDetailsCollection($orderTotalModules);
		
		$moduleCenterModules = [];
		foreach($json['moduleCenter'] as $moduleData)
		{
			$moduleCenterModules[] = $this->moduleDetailsSerializer->deserialize($moduleData);
		}
		$moduleCenter = new ModuleDetailsCollection($moduleCenterModules);
		
		return ModulesDetails::create($hub, $payment, $shipping, $orderTotal, $moduleCenter);
	}
}