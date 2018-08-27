<?php
/* --------------------------------------------------------------
   MerchantDetailsSerializerTest.inc.php 2018-08-01
   Gambio GmbH
   http://www.gambio.de
   Copyright (c) 2018 Gambio GmbH
   Released under the GNU General Public License (Version 2)
   [http://www.gnu.org/licenses/gpl-2.0.html]
   --------------------------------------------------------------
*/

use Gambio\AdminFeed\Services\ShopInformation\Serializer\MerchantAddressDetailsSerializer;
use Gambio\AdminFeed\Services\ShopInformation\Serializer\MerchantDetailsSerializer;
use Gambio\AdminFeed\Services\ShopInformation\ValueObjects\MerchantAddressDetails;
use Gambio\AdminFeed\Services\ShopInformation\ValueObjects\MerchantDetails;
use PHPUnit\Framework\TestCase;

/**
 * Class MerchantDetailsSerializerTest
 */
class MerchantDetailsSerializerTest extends TestCase
{
	/**
	 * @var array
	 */
	private $data;
	
	/**
	 * @var \Gambio\AdminFeed\Services\ShopInformation\ValueObjects\MerchantAddressDetails
	 */
	private $object;
	
	/**
	 * @var \Gambio\AdminFeed\Services\ShopInformation\Serializer\MerchantDetailsSerializer
	 */
	private $serializer;
	
	
	public function setUp()
	{
		$company   = 'Gambio GmbH';
		$firstName = 'John';
		$lastName  = 'Doe';
		$address   = $this->createMock(MerchantAddressDetails::class);
		$phone     = '0421 - 22 34 678';
		$fax       = '0421 - 123456798';
		$email     = 'admin@shop.de';
		
		$this->data = [
			'company'   => $company,
			'firstName' => $firstName,
			'lastName'  => $lastName,
			'address'   => [],
			'phone'     => $phone,
			'fax'       => $fax,
			'email'     => $email,
		];
		
		$this->object = MerchantDetails::create($company, $firstName, $lastName, $address, $phone, $fax, $email);
		
		$merchantAddressDetailsSerializer = $this->createMock(MerchantAddressDetailsSerializer::class);
		$merchantAddressDetailsSerializer->method('serialize')->willReturn([]);
		$merchantAddressDetailsSerializer->method('deserialize')->willReturn($address);
		
		$this->serializer = new MerchantDetailsSerializer($merchantAddressDetailsSerializer);
	}
	
	
	/**
	 * @test
	 */
	public function shouldSerializeCorrectly()
	{
		$actual   = $this->serializer->serialize($this->object);
		$expected = $this->data;
		
		$this->assertSame($expected, $actual);
	}
	
	
	/**
	 * @test
	 */
	public function shouldDeserializeCorrectly()
	{
		$actual   = $this->serializer->deserialize($this->data);
		$expected = $this->object;
		
		$this->assertEquals($expected, $actual);
	}
}