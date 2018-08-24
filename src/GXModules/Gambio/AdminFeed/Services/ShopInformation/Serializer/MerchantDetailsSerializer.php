<?php
/* --------------------------------------------------------------
   MerchantDetailsSerializer.php 2018-08-01
   Gambio GmbH
   http://www.gambio.de
   Copyright (c) 2018 Gambio GmbH
   Released under the GNU General Public License (Version 2)
   [http://www.gnu.org/licenses/gpl-2.0.html]
   --------------------------------------------------------------
*/

namespace Gambio\AdminFeed\Services\ShopInformation\Serializer;

use Gambio\AdminFeed\Services\ShopInformation\ValueObjects\MerchantDetails;

/**
 * Class MerchantDetailsSerializer
 *
 * @package Gambio\AdminFeed\Services\ShopInformation\Serializer
 */
class MerchantDetailsSerializer
{
	/**
	 * @var \Gambio\AdminFeed\Services\ShopInformation\Serializer\MerchantAddressDetailsSerializer
	 */
	private $merchantAddressDetailsSerializer;
	
	
	/**
	 * MerchantDetailsSerializer constructor.
	 *
	 * @param \Gambio\AdminFeed\Services\ShopInformation\Serializer\MerchantAddressDetailsSerializer $merchantAddressDetailsSerializer
	 */
	public function __construct(MerchantAddressDetailsSerializer $merchantAddressDetailsSerializer)
	{
		$this->merchantAddressDetailsSerializer = $merchantAddressDetailsSerializer;
	}
	
	
	/**
	 * @param \Gambio\AdminFeed\Services\ShopInformation\ValueObjects\MerchantDetails $fileSystemDetails
	 *
	 * @return array
	 */
	public function serialize(MerchantDetails $fileSystemDetails)
	{
		$json = [
			'company'   => $fileSystemDetails->company(),
			'firstname' => $fileSystemDetails->firstname(),
			'lastname'  => $fileSystemDetails->lastname(),
			'address'   => $this->merchantAddressDetailsSerializer->serialize($fileSystemDetails->address()),
			'telefon'   => $fileSystemDetails->telefon(),
			'telefax'   => $fileSystemDetails->telefax(),
			'email'     => $fileSystemDetails->email(),
		];
		
		return $json;
	}
	
	
	/**
	 * @param string|array $json
	 *
	 * @return \Gambio\AdminFeed\Services\ShopInformation\ValueObjects\MerchantDetails
	 */
	public function deserialize($json)
	{
		if(!is_array($json))
		{
			$json = json_decode($json, true);
		}
		
		if(!isset($json['company'])
		   || !isset($json['firstname'])
		   || !isset($json['lastname'])
		   || !isset($json['address'])
		   || !isset($json['telefon'])
		   || !isset($json['telefax'])
		   || !isset($json['email']))
		{
			throw new \InvalidArgumentException('Given argument is invalid. Needed property is missing.');
		}
		
		$address = $this->merchantAddressDetailsSerializer->deserialize($json['address']);
		
		return MerchantDetails::create($json['company'], $json['firstname'], $json['lastname'], $address,
		                               $json['telefon'], $json['telefax'], $json['email']);
	}
}