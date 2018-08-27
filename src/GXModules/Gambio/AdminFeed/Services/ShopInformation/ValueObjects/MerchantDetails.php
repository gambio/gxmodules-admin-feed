<?php
/* --------------------------------------------------------------
   MerchantDetails.php 2018-08-01
   Gambio GmbH
   http://www.gambio.de
   Copyright (c) 2018 Gambio GmbH
   Released under the GNU General Public License (Version 2)
   [http://www.gnu.org/licenses/gpl-2.0.html]
   --------------------------------------------------------------
*/

namespace Gambio\AdminFeed\Services\ShopInformation\ValueObjects;

/**
 * Class MerchantDetails
 *
 * @package Gambio\AdminFeed\Services\ShopInformation\ValueObjects
 */
class MerchantDetails
{
	/**
	 * @var string
	 */
	private $company;
	
	/**
	 * @var string
	 */
	private $firstName;
	
	/**
	 * @var string
	 */
	private $lastName;
	
	/**
	 * @var \Gambio\AdminFeed\Services\ShopInformation\ValueObjects\MerchantAddressDetails
	 */
	private $address;
	
	/**
	 * @var string
	 */
	private $phone;
	
	/**
	 * @var string
	 */
	private $fax;
	
	/**
	 * @var string
	 */
	private $email;
	
	
	/**
	 * MerchantDetails constructor.
	 *
	 * @param string                                                                         $company
	 * @param string                                                                         $firstName
	 * @param string                                                                         $lastName
	 * @param \Gambio\AdminFeed\Services\ShopInformation\ValueObjects\MerchantAddressDetails $address
	 * @param string                                                                         $phone
	 * @param string                                                                         $fax
	 * @param string                                                                         $email
	 */
	public function __construct($company,
	                            $firstName,
	                            $lastName,
	                            MerchantAddressDetails $address,
	                            $phone,
	                            $fax,
	                            $email)
	{
		$this->company   = $company;
		$this->firstName = $firstName;
		$this->lastName  = $lastName;
		$this->address   = $address;
		$this->phone     = $phone;
		$this->fax       = $fax;
		$this->email     = $email;
	}
	
	
	/**
	 * Creates and returns a new MerchantDetails instance.
	 *
	 * @param string                                                                         $company
	 * @param string                                                                         $firstName
	 * @param string                                                                         $lastName
	 * @param \Gambio\AdminFeed\Services\ShopInformation\ValueObjects\MerchantAddressDetails $address
	 * @param string                                                                         $phone
	 * @param string                                                                         $fax
	 * @param string                                                                         $email
	 *
	 * @return \Gambio\AdminFeed\Services\ShopInformation\ValueObjects\MerchantDetails
	 */
	static function create($company, $firstName, $lastName, MerchantAddressDetails $address, $phone, $fax, $email)
	{
		if(empty($email))
		{
			throw new \InvalidArgumentException('Email can not be empty.');
		}
		
		return new self($company, $firstName, $lastName, $address, $phone, $fax, $email);
	}
	
	
	/**
	 * Returns the name of the merchants company.
	 *
	 * @return string
	 */
	public function company()
	{
		return $this->company;
	}
	
	
	/**
	 * Returns the first name of the merchant.
	 *
	 * @return string
	 */
	public function firstName()
	{
		return $this->firstName;
	}
	
	
	/**
	 * Returns the last name of the merchant.
	 *
	 * @return string
	 */
	public function lastName()
	{
		return $this->lastName;
	}
	
	
	/**
	 * Returns the address details of the merchant.
	 *
	 * @return \Gambio\AdminFeed\Services\ShopInformation\ValueObjects\MerchantAddressDetails
	 */
	public function address()
	{
		return $this->address;
	}
	
	
	/**
	 * Returns the phone number of the merchant.
	 *
	 * @return string
	 */
	public function phone()
	{
		return $this->phone;
	}
	
	
	/**
	 * Returns the fax number of the merchant.
	 *
	 * @return string
	 */
	public function fax()
	{
		return $this->fax;
	}
	
	
	/**
	 * Returns the email address of the merchant.
	 *
	 * @return string
	 */
	public function email()
	{
		return $this->email;
	}
}