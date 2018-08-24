<?php
/* --------------------------------------------------------------
   MerchantAddressDetailsSerializer.php 2018-08-01
   Gambio GmbH
   http://www.gambio.de
   Copyright (c) 2018 Gambio GmbH
   Released under the GNU General Public License (Version 2)
   [http://www.gnu.org/licenses/gpl-2.0.html]
   --------------------------------------------------------------
*/

namespace Gambio\AdminFeed\Services\ShopInformation\Serializer;

use Gambio\AdminFeed\Services\ShopInformation\ValueObjects\MerchantAddressDetails;

/**
 * Class MerchantAdressDetailsSerializer
 *
 * @package Gambio\AdminFeed\Services\ShopInformation\Serializer
 */
class MerchantAddressDetailsSerializer
{
	/**
	 * @param \Gambio\AdminFeed\Services\ShopInformation\ValueObjects\MerchantAddressDetails $merchantAddressDetails
	 *
	 * @return array
	 */
	public function serialize(MerchantAddressDetails $merchantAddressDetails)
	{
		$json = [
			'street'      => $merchantAddressDetails->street(),
			'houseNumber' => $merchantAddressDetails->houseNumber(),
			'postalCode'  => $merchantAddressDetails->postalCode(),
			'city'        => $merchantAddressDetails->city(),
			'state'       => $merchantAddressDetails->state(),
			'country'     => $merchantAddressDetails->country(),
		];
		
		return $json;
	}
	
	
	/**
	 * @param string|array $json
	 *
	 * @return \Gambio\AdminFeed\Services\ShopInformation\ValueObjects\MerchantAddressDetails
	 */
	public function deserialize($json)
	{
		if(!is_array($json))
		{
			$json = json_decode($json, true);
		}
		
		if(!isset($json['street'])
		   || !isset($json['houseNumber'])
		   || !isset($json['postalCode'])
		   || !isset($json['city'])
		   || !isset($json['state'])
		   || !isset($json['country']))
		{
			throw new \InvalidArgumentException('Given argument is invalid. Needed property is missing.');
		}
		
		return MerchantAddressDetails::create($json['street'], $json['houseNumber'], $json['postalCode'], $json['city'],
		                                      $json['state'], $json['country']);
	}
}