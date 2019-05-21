<?php
/* --------------------------------------------------------------
   UpdateDetailsSerializer.php 2018-08-01
   Gambio GmbH
   http://www.gambio.de
   Copyright (c) 2018 Gambio GmbH
   Released under the GNU General Public License (Version 2)
   [http://www.gnu.org/licenses/gpl-2.0.html]
   --------------------------------------------------------------
*/

namespace Gambio\AdminFeed\Services\ShopInformation\Serializer;

use Gambio\AdminFeed\Services\ShopInformation\ValueObjects\UpdateDetails;

/**
 * Class UpdateDetailsSerializer
 *
 * @package Gambio\AdminFeed\Services\ShopInformation\Serializer
 */
class UpdateDetailsSerializer
{
	/**
	 * Serializes a given UpdateDetails instance.
	 *
	 * @param \Gambio\AdminFeed\Services\ShopInformation\ValueObjects\UpdateDetails $updateDetails
	 *
	 * @return array
	 */
	public function serialize(UpdateDetails $updateDetails)
	{
		$json = [
			'name'             => $updateDetails->name(),
			'version'          => $updateDetails->version(),
			'installationDate' => $updateDetails->installationDate(),
		];
		
		return $json;
	}
	
	
	/**
	 * Returns a new UpdateDetails instance by using the data of a given array or json strings.
	 *
	 * @param string|array $json
	 *
	 * @return \Gambio\AdminFeed\Services\ShopInformation\ValueObjects\UpdateDetails
	 */
	public function deserialize($json)
	{
		if(!is_array($json))
		{
			$json = json_decode($json, true);
		}
		
		$neededProperties = [
			'name',
			'version',
			'installationDate',
		];
		foreach($neededProperties as $property)
		{
			if(!array_key_exists($property, $json))
			{
				throw new \InvalidArgumentException('Property "'.$property.'" is missing.');
			}
		}
		
		return UpdateDetails::create($json['name'], $json['version'], $json['installationDate']);
	}
}