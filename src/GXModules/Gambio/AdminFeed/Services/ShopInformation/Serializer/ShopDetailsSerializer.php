<?php
/* --------------------------------------------------------------
   ShopDetailsSerializer.php 2018-08-01
   Gambio GmbH
   http://www.gambio.de
   Copyright (c) 2018 Gambio GmbH
   Released under the GNU General Public License (Version 2)
   [http://www.gnu.org/licenses/gpl-2.0.html]
   --------------------------------------------------------------
*/

namespace Gambio\AdminFeed\Services\ShopInformation\Serializer;

use Gambio\AdminFeed\Services\ShopInformation\ValueObjects\ShopDetails;

/**
 * Class ShopDetailsSerializer
 *
 * @package Gambio\AdminFeed\Services\ShopInformation\Serializer
 */
class ShopDetailsSerializer
{
	/**
	 * @param \Gambio\AdminFeed\Services\ShopInformation\ValueObjects\ShopDetails $shopDetails
	 *
	 * @return array
	 */
	public function serialize(ShopDetails $shopDetails)
	{
		$json = [
			'name'            => $shopDetails->name(),
			'owner'           => $shopDetails->owner(),
			'version'         => $shopDetails->version(),
			'url'             => $shopDetails->url(),
			'key'             => $shopDetails->key(),
			'languages'       => $shopDetails->languages(),
			'defaultLanguage' => $shopDetails->defaultLanguage(),
			'countries'       => $shopDetails->countries(),
		];
		
		return $json;
	}
	
	
	/**
	 * @param string|array $json
	 *
	 * @return \Gambio\AdminFeed\Services\ShopInformation\ValueObjects\ShopDetails
	 */
	public function deserialize($json)
	{
		if(!is_array($json))
		{
			$json = json_decode($json, true);
		}
		
		if(!isset($json['name'])
		   || !isset($json['owner'])
		   || !isset($json['version'])
		   || !isset($json['url'])
		   || !isset($json['key'])
		   || !isset($json['languages'])
		   || !isset($json['defaultLanguage'])
		   || !isset($json['countries']))
		{
			throw new \InvalidArgumentException('Given argument is invalid. Needed property is missing.');
		}
		
		return ShopDetails::create($json['name'], $json['owner'], $json['version'], $json['url'], $json['key'],
		                           $json['languages'], $json['defaultLanguage'], $json['countries']);
	}
}