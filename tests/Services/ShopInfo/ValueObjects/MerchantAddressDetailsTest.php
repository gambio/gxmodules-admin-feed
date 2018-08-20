<?php
/* --------------------------------------------------------------
   MerchantAddressDetailsTest.inc.php 2018-08-01
   Gambio GmbH
   http://www.gambio.de
   Copyright (c) 2018 Gambio GmbH
   Released under the GNU General Public License (Version 2)
   [http://www.gnu.org/licenses/gpl-2.0.html]
   --------------------------------------------------------------
*/

use Gambio\AdminFeed\Services\ShopInformation\ValueObjects\MerchantAddressDetails;
use PHPUnit\Framework\TestCase;

/**
 * Class MerchantAddressDetailsTest
 */
class MerchantAddressDetailsTest extends TestCase
{
	/**
	 * @var string
	 */
	private $street = 'Parallelweg';
	
	/**
	 * @var string
	 */
	private $houseNumber = '30';
	
	/**
	 * @var string
	 */
	private $postalCode = '28219';
	
	/**
	 * @var string
	 */
	private $city = 'Bremen';
	
	/**
	 * @var string
	 */
	private $state = 'Bremen';
	
	/**
	 * @var string
	 */
	private $country = 'Deutschland';
	
	/**
	 * @var \Gambio\AdminFeed\Services\ShopInformation\ValueObjects\MerchantAddressDetails
	 */
	private $merchantAddressDetails;
	
	
	public function setUp()
	{
		$this->merchantAddressDetails = MerchantAddressDetails::create($this->street, $this->houseNumber,
		                                                               $this->postalCode, $this->city, $this->state,
		                                                               $this->country);
	}
	
	
	/**
	 * @test
	 */
	public function shouldReturnGivenStreet()
	{
		$this->assertEquals($this->merchantAddressDetails->street(), $this->street);
	}
	
	
	/**
	 * @test
	 */
	public function shouldReturnGivenHouseNumber()
	{
		$this->assertEquals($this->merchantAddressDetails->houseNumber(), $this->houseNumber);
	}
	
	
	/**
	 * @test
	 */
	public function shouldReturnGivenPostalCode()
	{
		$this->assertEquals($this->merchantAddressDetails->postalCode(), $this->postalCode);
	}
	
	
	/**
	 * @test
	 */
	public function shouldReturnGivenCity()
	{
		$this->assertEquals($this->merchantAddressDetails->city(), $this->city);
	}
	
	
	/**
	 * @test
	 */
	public function shouldReturnGivenState()
	{
		$this->assertEquals($this->merchantAddressDetails->state(), $this->state);
	}
	
	
	/**
	 * @test
	 */
	public function shouldReturnGivenCountry()
	{
		$this->assertEquals($this->merchantAddressDetails->country(), $this->country);
	}
}