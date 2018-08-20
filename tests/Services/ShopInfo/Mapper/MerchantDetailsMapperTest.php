<?php
/* --------------------------------------------------------------
   MerchantDetailsMapperTest.inc.php 2018-08-01
   Gambio GmbH
   http://www.gambio.de
   Copyright (c) 2018 Gambio GmbH
   Released under the GNU General Public License (Version 2)
   [http://www.gnu.org/licenses/gpl-2.0.html]
   --------------------------------------------------------------
*/

use Gambio\AdminFeed\Services\ShopInformation\Mapper\MerchantDetailsMapper;
use Gambio\AdminFeed\Services\ShopInformation\Reader\MerchantDetailsReader;
use Gambio\AdminFeed\Services\ShopInformation\ValueObjects\FileSystemDetails;
use Gambio\AdminFeed\Services\ShopInformation\ValueObjects\MerchantAddressDetails;
use Gambio\AdminFeed\Services\ShopInformation\ValueObjects\MerchantDetails;
use PHPUnit\Framework\TestCase;

/**
 * Class MerchantDetailsMapperTest
 */
class MerchantDetailsMapperTest extends TestCase
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
	 * @var string
	 */
	private $telefon = '0421 - 22 34 678';
	
	/**
	 * @var string
	 */
	private $telefax = '0421 - 123456789';
	
	/**
	 * @var string
	 */
	private $email = 'admin@shop.de';
	
	
	/**
	 * @var \Gambio\AdminFeed\Services\ShopInformation\Reader\MerchantDetailsReader
	 */
	private $reader;
	
	/**
	 * @var \Gambio\AdminFeed\Services\ShopInformation\Mapper\MerchantDetailsMapper
	 */
	private $mapper;
	
	
	public function setUp()
	{
		$this->reader = $this->mockReader();
		
		$this->mapper = new MerchantDetailsMapper($this->reader);
	}
	
	
	/**
	 * @test
	 */
	public function shouldReturnExpectedMerchantDetailsDetails()
	{
		$expectedDetails = $this->expectedMerchantDetails();
		
		$this->assertEquals($this->mapper->getMerchantDetails(), $expectedDetails);
	}
	
	
	private function expectedMerchantDetails()
	{
		$address = MerchantAddressDetails::create($this->street, $this->houseNumber, $this->postalCode, $this->city,
		                                          $this->state, $this->country);
		
		return MerchantDetails::create($this->company, $this->firstname, $this->lastname, $address, $this->telefon,
		                               $this->telefax, $this->email);
	}
	
	
	private function mockReader()
	{
		$reader = $this->createMock(MerchantDetailsReader::class);
		$reader->method('getCompany')->willReturn($this->company);
		$reader->method('getFirstname')->willReturn($this->firstname);
		$reader->method('getLastname')->willReturn($this->lastname);
		$reader->method('getStreet')->willReturn($this->street);
		$reader->method('getHouseNumber')->willReturn($this->houseNumber);
		$reader->method('getPostalCode')->willReturn($this->postalCode);
		$reader->method('getCity')->willReturn($this->city);
		$reader->method('getState')->willReturn($this->state);
		$reader->method('getCountry')->willReturn($this->country);
		$reader->method('getTelefon')->willReturn($this->telefon);
		$reader->method('getTelefax')->willReturn($this->telefax);
		$reader->method('getEmail')->willReturn($this->email);
		
		return $reader;
	}
}