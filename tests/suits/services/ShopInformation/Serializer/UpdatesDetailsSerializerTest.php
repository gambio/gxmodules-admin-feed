<?php
/* --------------------------------------------------------------
   UpdatesDetailsSerializerTest.inc.php 2018-08-01
   Gambio GmbH
   http://www.gambio.de
   Copyright (c) 2018 Gambio GmbH
   Released under the GNU General Public License (Version 2)
   [http://www.gnu.org/licenses/gpl-2.0.html]
   --------------------------------------------------------------
*/

use Gambio\AdminFeed\Services\ShopInformation\Collections\UpdateDetailsCollection;
use Gambio\AdminFeed\Services\ShopInformation\Serializer\UpdateDetailsSerializer;
use Gambio\AdminFeed\Services\ShopInformation\Serializer\UpdatesDetailsSerializer;
use Gambio\AdminFeed\Services\ShopInformation\ValueObjects\UpdatesDetails;
use PHPUnit\Framework\TestCase;

/**
 * Class UpdatesDetailsSerializerTest
 */
class UpdatesDetailsSerializerTest extends TestCase
{
	/**
	 * @var array
	 */
	private $data;
	
	/**
	 * @var \Gambio\AdminFeed\Services\ShopInformation\ValueObjects\UpdatesDetails
	 */
	private $object;
	
	/**
	 * @var \Gambio\AdminFeed\Services\ShopInformation\Serializer\UpdatesDetailsSerializer
	 */
	private $serializer;
	
	
	public function setUp()
	{
		$updateCollection = UpdateDetailsCollection::create();
		
		$this->data = [
			'installed'  => [],
			'downloaded' => [],
		];
		
		$this->object = UpdatesDetails::create($updateCollection, $updateCollection);
		
		$updateDetailsSerializer = $this->createMock(UpdateDetailsSerializer::class);
		$updateDetailsSerializer->method('serialize')->willReturn([]);
		$updateDetailsSerializer->method('deserialize')->willReturn($updateCollection);
		
		$this->serializer = new UpdatesDetailsSerializer($updateDetailsSerializer);
	}
	
	
	/**
	 * @test
	 */
	public function shouldSerializeCorrectly()
	{
		$expected = $this->data;
		$actual   = $this->serializer->serialize($this->object);
		
		$this->assertSame($expected, $actual);
	}
	
	
	/**
	 * @test
	 */
	public function shouldDeserializeCorrectly()
	{
		$expected = $this->object;
		$actual   = $this->serializer->deserialize($this->data);
		
		$this->assertEquals($expected, $actual);
	}
}