<?php
/* --------------------------------------------------------------
   ModulesDetailsSerializerTest.inc.php 2018-08-01
   Gambio GmbH
   http://www.gambio.de
   Copyright (c) 2018 Gambio GmbH
   Released under the GNU General Public License (Version 2)
   [http://www.gnu.org/licenses/gpl-2.0.html]
   --------------------------------------------------------------
*/

use Gambio\AdminFeed\Services\ShopInformation\Collections\ModuleDetailsCollection;
use Gambio\AdminFeed\Services\ShopInformation\Serializer\ModuleDetailsSerializer;
use Gambio\AdminFeed\Services\ShopInformation\Serializer\ModulesDetailsSerializer;
use Gambio\AdminFeed\Services\ShopInformation\ValueObjects\ModulesDetails;
use PHPUnit\Framework\TestCase;

/**
 * Class ModulesDetailsSerializerTest
 */
class ModulesDetailsSerializerTest extends TestCase
{
	/**
	 * @var array
	 */
	private $data;
	
	/**
	 * @var \Gambio\AdminFeed\Services\ShopInformation\ValueObjects\ModulesDetails
	 */
	private $object;
	
	/**
	 * @var \Gambio\AdminFeed\Services\ShopInformation\Serializer\ModulesDetailsSerializer
	 */
	private $serializer;
	
	
	#[\Override]
 public function setUp()
	{
		$modulesCollection = ModuleDetailsCollection::create();
		
		$this->data = [
			'hub'          => [],
			'payment'      => [],
			'shipping'     => [],
			'orderTotal'   => [],
			'moduleCenter' => [],
		];
		
		$this->object = ModulesDetails::create($modulesCollection, $modulesCollection, $modulesCollection,
		                                       $modulesCollection, $modulesCollection);
		
		$moduleDetailsSerializer = $this->createMock(ModuleDetailsSerializer::class);
		$moduleDetailsSerializer->method('serialize')->willReturn([]);
		$moduleDetailsSerializer->method('deserialize')->willReturn($modulesCollection);
		
		$this->serializer = new ModulesDetailsSerializer($moduleDetailsSerializer);
	}
	
	
	/**
	 * @test
	 */
	public function shouldSerializeCorrectly(): void
	{
		$actual   = $this->serializer->serialize($this->object);
		$expected = $this->data;
		
		$this->assertSame($expected, $actual);
	}
	
	
	/**
	 * @test
	 */
	public function shouldDeserializeCorrectly(): void
	{
		$actual   = $this->serializer->deserialize($this->data);
		$expected = $this->object;
		
		$this->assertEquals($expected, $actual);
	}
}