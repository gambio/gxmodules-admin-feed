<?php
/* --------------------------------------------------------------
   ModuleDetailsSerializerTest.inc.php 2018-08-01
   Gambio GmbH
   http://www.gambio.de
   Copyright (c) 2018 Gambio GmbH
   Released under the GNU General Public License (Version 2)
   [http://www.gnu.org/licenses/gpl-2.0.html]
   --------------------------------------------------------------
*/

use Gambio\AdminFeed\Services\ShopInformation\Serializer\ModuleDetailsSerializer;
use Gambio\AdminFeed\Services\ShopInformation\ValueObjects\ModuleDetails;
use PHPUnit\Framework\TestCase;

/**
 * Class ModuleDetailsSerializerTest
 */
class ModuleDetailsSerializerTest extends TestCase
{
	/**
	 * @var array
	 */
	private $data;
	
	/**
	 * @var \Gambio\AdminFeed\Services\ShopInformation\ValueObjects\ModuleDetails
	 */
	private $object;
	
	/**
	 * @var \Gambio\AdminFeed\Services\ShopInformation\Serializer\ModuleDetailsSerializer
	 */
	private $serializer;
	
	
	public function setUp()
	{
		$name      = 'Some Module';
		$installed = true;
		$enabled   = false;
		
		$this->data = [
			'name'      => $name,
			'installed' => $installed,
			'enabled'   => $enabled,
		];
		
		$this->object = ModuleDetails::create($name, $installed, $enabled);
		
		$this->serializer = new ModuleDetailsSerializer();
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