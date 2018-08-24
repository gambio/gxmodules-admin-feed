<?php
/* --------------------------------------------------------------
   MerchantAddressDetailsSerializerTest.inc.php 2018-08-01
   Gambio GmbH
   http://www.gambio.de
   Copyright (c) 2018 Gambio GmbH
   Released under the GNU General Public License (Version 2)
   [http://www.gnu.org/licenses/gpl-2.0.html]
   --------------------------------------------------------------
*/

use Gambio\AdminFeed\Services\ShopInformation\Serializer\MerchantAddressDetailsSerializer;
use Gambio\AdminFeed\Services\ShopInformation\ValueObjects\MerchantAddressDetails;
use PHPUnit\Framework\TestCase;

/**
 * Class MerchantAddressDetailsSerializerTest
 */
class MerchantAddressDetailsSerializerTest extends TestCase
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
	 * @var \Gambio\AdminFeed\Services\ShopInformation\Serializer\MerchantAddressDetailsSerializer
	 */
	private $serializer;
	
	
	public function setUp()
	{
		$street      = 'Parallelweg';
		$houseNumber = '30';
		$postalCode  = '28219';
		$city        = 'Bremen';
		$state       = 'Bremen';
		$country     = 'Deutschland';
		
		$this->data = [
			'street'      => $street,
			'houseNumber' => $houseNumber,
			'postalCode'  => $postalCode,
			'city'        => $city,
			'state'       => $state,
			'country'     => $country,
		];
		
		$this->object = MerchantAddressDetails::create($street, $houseNumber, $postalCode, $city, $state, $country);
		
		$this->serializer = new MerchantAddressDetailsSerializer();
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