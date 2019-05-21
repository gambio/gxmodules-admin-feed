<?php
/* --------------------------------------------------------------
   ModuleDetailsSerializer.php 2018-08-01
   Gambio GmbH
   http://www.gambio.de
   Copyright (c) 2018 Gambio GmbH
   Released under the GNU General Public License (Version 2)
   [http://www.gnu.org/licenses/gpl-2.0.html]
   --------------------------------------------------------------
*/

namespace Gambio\AdminFeed\Services\ShopInformation\Serializer;

use Gambio\AdminFeed\Services\ShopInformation\ValueObjects\ModuleDetails;

/**
 * Class ModuleDetailsSerializer
 *
 * @package Gambio\AdminFeed\Services\ShopInformation\Serializer
 */
class ModuleDetailsSerializer
{
	/**
	 * Serializes a given ModuleDetails instance.
	 *
	 * @param \Gambio\AdminFeed\Services\ShopInformation\ValueObjects\ModuleDetails $moduleDetails
	 *
	 * @return array
	 */
	public function serialize(ModuleDetails $moduleDetails)
	{
		$json = [
			'name'      => $moduleDetails->name(),
			'installed' => $moduleDetails->installed(),
			'enabled'   => $moduleDetails->enabled(),
		];
		
		return $json;
	}
	
	
	/**
	 * Returns a new ModuleDetails instance by using the data of a given array or json strings.
	 *
	 * @param string|array $json
	 *
	 * @return \Gambio\AdminFeed\Services\ShopInformation\ValueObjects\ModuleDetails
	 */
	public function deserialize($json)
	{
		if(!is_array($json))
		{
			$json = json_decode($json, true);
		}
		
		$neededProperties = [
			'name',
			'installed',
			'enabled',
		];
		foreach($neededProperties as $property)
		{
			if(!array_key_exists($property, $json))
			{
				throw new \InvalidArgumentException('Property "'.$property.'" is missing.');
			}
		}
		
		return ModuleDetails::create($json['name'], $json['installed'], $json['enabled']);
	}
}