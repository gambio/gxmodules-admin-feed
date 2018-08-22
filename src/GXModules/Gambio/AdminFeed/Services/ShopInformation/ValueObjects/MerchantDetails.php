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
	private $firstname;
	
	/**
	 * @var string
	 */
	private $lastname;
	
	/**
	 * @var \Gambio\AdminFeed\Services\ShopInformation\ValueObjects\MerchantAddressDetails
	 */
	private $address;
	
	/**
	 * @var string
	 */
	private $telefon;
	
	/**
	 * @var string
	 */
	private $telefax;
	
	/**
	 * @var string
	 */
	private $email;
	
	
	/**
	 * MerchantDetails constructor.
	 *
	 * @param string                                                                         $company
	 * @param string                                                                         $firstname
	 * @param string                                                                         $lastname
	 * @param \Gambio\AdminFeed\Services\ShopInformation\ValueObjects\MerchantAddressDetails $address
	 * @param string                                                                         $telefon
	 * @param string                                                                         $telefax
	 * @param string                                                                         $email
	 */
	public function __construct($company,
	                            $firstname,
	                            $lastname,
	                            MerchantAddressDetails $address,
	                            $telefon,
	                            $telefax,
	                            $email)
	{
		$this->company   = $company;
		$this->firstname = $firstname;
		$this->lastname  = $lastname;
		$this->address   = $address;
		$this->telefon   = $telefon;
		$this->telefax   = $telefax;
		$this->email     = $email;
	}
	
	
	/**
	 * @param string                                                                         $company
	 * @param string                                                                         $firstname
	 * @param string                                                                         $lastname
	 * @param \Gambio\AdminFeed\Services\ShopInformation\ValueObjects\MerchantAddressDetails $address
	 * @param string                                                                         $telefon
	 * @param string                                                                         $telefax
	 * @param string                                                                         $email
	 *
	 * @return self
	 */
	static function create($company, $firstname, $lastname, MerchantAddressDetails $address, $telefon, $telefax, $email)
	{
		if(empty($email))
		{
			throw new \InvalidArgumentException('Email can not be empty.');
		}
		
		return new self($company, $firstname, $lastname, $address, $telefon, $telefax, $email);
	}
	
	
	/**
	 * @return string
	 */
	public function company()
	{
		return $this->company;
	}
	
	
	/**
	 * @return string
	 */
	public function firstname()
	{
		return $this->firstname;
	}
	
	
	/**
	 * @return string
	 */
	public function lastname()
	{
		return $this->lastname;
	}
	
	
	/**
	 * @return string
	 */
	public function address()
	{
		return $this->address;
	}
	
	
	/**
	 * @return string
	 */
	public function telefon()
	{
		return $this->telefon;
	}
	
	
	/**
	 * @return string
	 */
	public function telefax()
	{
		return $this->telefax;
	}
	
	
	/**
	 * @return string
	 */
	public function email()
	{
		return $this->email;
	}
}