<?php
/* --------------------------------------------------------------
   PhpServerDetailsSerializer.php 2018-08-01
   Gambio GmbH
   http://www.gambio.de
   Copyright (c) 2018 Gambio GmbH
   Released under the GNU General Public License (Version 2)
   [http://www.gnu.org/licenses/gpl-2.0.html]
   --------------------------------------------------------------
*/

namespace Gambio\AdminFeed\Services\ShopInformation\Serializer;

use Gambio\AdminFeed\Services\ShopInformation\ValueObjects\PhpServerDetails;

/**
 * Class PhpServerDetailsSerializer
 *
 * @package Gambio\AdminFeed\Services\ShopInformation\Serializer
 */
class PhpServerDetailsSerializer
{
	/**
	 * Serializes a given PhpServerDetails instance.
	 *
	 * @param \Gambio\AdminFeed\Services\ShopInformation\ValueObjects\PhpServerDetails $phpServerDetails
	 *
	 * @return array
	 */
	public function serialize(PhpServerDetails $phpServerDetails)
	{
		$json = [
			'version'       => $phpServerDetails->version(),
			'extensions'    => $phpServerDetails->extensions(),
			'configuration' => $phpServerDetails->configuration(),
		];
		
		return $json;
	}
	
	
	/**
	 * Returns a new PhpServerDetails instance by using the data of a given array or json strings.
	 *
	 * @param string|array $json
	 *
	 * @return \Gambio\AdminFeed\Services\ShopInformation\ValueObjects\PhpServerDetails
	 */
	public function deserialize($json)
	{
		if(!is_array($json))
		{
			$json = json_decode($json, true);
		}
		
		$neededProperties = [
			'version',
			'extensions',
			'configuration',
		];
		foreach($neededProperties as $property)
		{
			if(!array_key_exists($property, $json))
			{
				throw new \InvalidArgumentException('Property "'.$property.'" is missing.');
			}
		}
		
		return PhpServerDetails::create($json['version'], $json['extensions'], $json['configuration']);
	}
}