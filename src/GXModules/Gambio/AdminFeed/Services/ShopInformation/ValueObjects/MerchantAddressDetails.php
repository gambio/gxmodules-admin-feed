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
 * Class MerchantAdressDetails
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
	 * @param string $street
	 * @param string $houseNumber
	 * @param string $postalCode
	 * @param string $city
	 * @param string $state
	 * @param string $country
	 *
	 * @return self
	 */
	static function create($street, $houseNumber, $postalCode, $city, $state, $country)
	{
		return new self($street, $houseNumber, $postalCode, $city, $state, $country);
	}
	
	
	/**
	 * @return string
	 */
	public function street()
	{
		return $this->street;
	}
	
	
	/**
	 * @return string
	 */
	public function houseNumber()
	{
		return $this->houseNumber;
	}
	
	
	/**
	 * @return string
	 */
	public function postalCode()
	{
		return $this->postalCode;
	}
	
	
	/**
	 * @return string
	 */
	public function city()
	{
		return $this->city;
	}
	
	
	/**
	 * @return string
	 */
	public function state()
	{
		return $this->state;
	}
	
	
	/**
	 * @return string
	 */
	public function country()
	{
		return $this->country;
	}
}