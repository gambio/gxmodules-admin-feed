<?php
/* --------------------------------------------------------------
   ShopDetailsSerializerTest.inc.php 2018-08-01
   Gambio GmbH
   http://www.gambio.de
   Copyright (c) 2018 Gambio GmbH
   Released under the GNU General Public License (Version 2)
   [http://www.gnu.org/licenses/gpl-2.0.html]
   --------------------------------------------------------------
*/

use Gambio\AdminFeed\Services\ShopInformation\Serializer\ShopDetailsSerializer;
use Gambio\AdminFeed\Services\ShopInformation\ValueObjects\ShopDetails;
use PHPUnit\Framework\TestCase;

/**
 * Class ShopDetailsSerializerTest
 */
class ShopDetailsSerializerTest extends TestCase
{
	/**
	 * @var array
	 */
	private $data;
	
	/**
	 * @var \Gambio\AdminFeed\Services\ShopInformation\ValueObjects\ShopDetails
	 */
	private $object;
	
	/**
	 * @var \Gambio\AdminFeed\Services\ShopInformation\Serializer\ShopDetailsSerializer
	 */
	private $serializer;
	
	
	public function setUp()
	{
		$version         = 'v1.0.1';
		$url             = 'https://www.example.org';
		$key             = 'ABCDE-FGHI-JKLM-NOPQ';
		$languages       = ['de', 'en'];
		$defaultLanguage = 'de';
		$countries       = ['de', 'at', 'ch'];
		
		$this->data = [
			'version'         => $version,
			'url'             => $url,
			'key'             => $key,
			'languages'       => $languages,
			'defaultLanguage' => $defaultLanguage,
			'countries'       => $countries,
		];
		
		$this->object = ShopDetails::create($version, $url, $key, $languages, $defaultLanguage, $countries);
		
		$this->serializer = new ShopDetailsSerializer();
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