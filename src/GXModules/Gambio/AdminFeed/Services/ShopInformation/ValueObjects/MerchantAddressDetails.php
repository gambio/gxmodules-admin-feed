<?php
/* --------------------------------------------------------------
   MerchantAddressDetails.php 2018-08-01
   Gambio GmbH
   http://www.gambio.de
   Copyright (c) 2018 Gambio GmbH
   Released under the GNU General Public License (Version 2)
   [http://www.gnu.org/licenses/gpl-2.0.html]
   --------------------------------------------------------------
*/

namespace Gambio\AdminFeed\Services\ShopInformation\ValueObjects;

/**
 * Class MerchantAddressDetails
 *
 * @package Gambio\AdminFeed\Services\ShopInformation\ValueObjects
 */
class MerchantAddressDetails
{
	/**
	 * @var string
	 */
	private $street;
	
	/**
	 * @var string
	 */
	private $houseNumber;
	
	/**
	 * @var string
	 */
	private $postalCode;
	
	/**
	 * @var string
	 */
	private $city;
	
	/**
	 * @var string
	 */
	private $state;
	
	/**
	 * @var string
	 */
	private $country;
	
	
	/**
	 * MerchantAddressDetails constructor.
	 *
	 * @param string $street
	 * @param string $houseNumber
	 * @param string $postalCode
	 * @param string $city
	 * @param string $state
	 * @param string $country
	 */
	public function __construct($street, $houseNumber, $postalCode, $city, $state, $country)
	{
		$this->street      = $street;
		$this->houseNumber = $houseNumber;
		$this->postalCode  = $postalCode;
		$this->city        = $city;
		$this->state       = $state;
		$this->country     = $country;
	}
	
	
	/**
	 * Creates and returns a new MerchantAddressDetails instance.
	 *
	 * @param string $street
	 * @param string $houseNumber
	 * @param string $postalCode
	 * @param string $city
	 * @param string $state
	 * @param string $country
	 *
	 * @return \Gambio\AdminFeed\Services\ShopInformation\ValueObjects\MerchantAddressDetails
	 */
	static function create($street, $houseNumber, $postalCode, $city, $state, $country)
	{
		if(empty($state))
		{
			throw new \InvalidArgumentException('State can not be empty.');
		}
		elseif(empty($country))
		{
			throw new \InvalidArgumentException('Country can not be empty.');
		}
		
		return new self($street, $houseNumber, $postalCode, $city, $state, $country);
	}
	
	
	/**
	 * Returns the street of the merchants address.
	 *
	 * @return string
	 */
	public function street()
	{
		return $this->street;
	}
	
	
	/**
	 * Returns the house number of the merchants address.
	 *
	 * @return string
	 */
	public function houseNumber()
	{
		return $this->houseNumber;
	}
	
	
	/**
	 * Returns the postal code of the merchants address.
	 *
	 * @return string
	 */
	public function postalCode()
	{
		return $this->postalCode;
	}
	
	
	/**
	 * Returns the city of the merchants address.
	 *
	 * @return string
	 */
	public function city()
	{
		return $this->city;
	}
	
	
	/**
	 * Returns the state of the merchants address.
	 *
	 * @return string
	 */
	public function state()
	{
		return $this->state;
	}
	
	
	/**
	 * Returns the country of the merchants address.
	 *
	 * @return string
	 */
	public function country()
	{
		return $this->country;
	}
}