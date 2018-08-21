<?php
/* --------------------------------------------------------------
   MerchantDetailsTest.inc.php 2018-08-01
   Gambio GmbH
   http://www.gambio.de
   Copyright (c) 2018 Gambio GmbH
   Released under the GNU General Public License (Version 2)
   [http://www.gnu.org/licenses/gpl-2.0.html]
   --------------------------------------------------------------
*/

use Gambio\AdminFeed\Services\ShopInformation\ValueObjects\MerchantAddressDetails;
use Gambio\AdminFeed\Services\ShopInformation\ValueObjects\MerchantDetails;
use PHPUnit\Framework\TestCase;

/**
 * Class MerchantDetailsTest
 */
class MerchantDetailsTest extends TestCase
{
	/**
	 * @var string
	 */
	private $company = 'Gambio GmbH';
	
	/**
	 * @var string
	 */
	private $firstname = 'John';
	
	/**
	 * @var string
	 */
	private $lastname = 'Doe';
	
	/**
	 * @var \Gambio\AdminFeed\Services\ShopInformation\ValueObjects\MerchantAddressDetails
	 */
	private $address;
	
	/**
	 * @var string
	 */
	private $telefon = '0421 - 22 34 678';
	
	/**
	 * @var string
	 */
	private $telefax = '0421 - 123456798';
	
	/**
	 * @var string
	 */
	private $email = 'admin@shop.de';
	
	/**
	 * @var \Gambio\AdminFeed\Services\ShopInformation\ValueObjects\MerchantDetails
	 */
	private $merchantDetails;
	
	
	public function setUp()
	{
		$this->address = $this->createMock(MerchantAddressDetails::class);
		
		$this->merchantDetails = MerchantDetails::create($this->company, $this->firstname, $this->lastname,
		                                                 $this->address, $this->telefon, $this->telefax, $this->email);
	}
	
	
	/**
	 * @test
	 */
	public function shouldReturnGivenCompany()
	{
		$this->assertSame($this->merchantDetails->company(), $this->company);
	}
	
	
	/**
	 * @test
	 */
	public function shouldReturnGivenFirstname()
	{
		$this->assertSame($this->merchantDetails->firstname(), $this->firstname);
	}
	
	
	/**
	 * @test
	 */
	public function shouldReturnGivenLastname()
	{
		$this->assertSame($this->merchantDetails->lastname(), $this->lastname);
	}
	
	
	/**
	 * @test
	 */
	public function shouldReturnGivenAddress()
	{
		$this->assertSame($this->merchantDetails->address(), $this->address);
	}
	
	
	/**
	 * @test
	 */
	public function shouldReturnGivenTelefon()
	{
		$this->assertSame($this->merchantDetails->telefon(), $this->telefon);
	}
	
	
	/**
	 * @test
	 */
	public function shouldReturnGivenTelefax()
	{
		$this->assertSame($this->merchantDetails->telefax(), $this->telefax);
	}
	
	
	/**
	 * @test
	 */
	public function shouldReturnGivenEmail()
	{
		$this->assertSame($this->merchantDetails->email(), $this->email);
	}
}