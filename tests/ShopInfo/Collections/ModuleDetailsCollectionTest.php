<?php
/* --------------------------------------------------------------
   FileSystemDetailsTest.inc.php 2018-08-01
   Gambio GmbH
   http://www.gambio.de
   Copyright (c) 2018 Gambio GmbH
   Released under the GNU General Public License (Version 2)
   [http://www.gnu.org/licenses/gpl-2.0.html]
   --------------------------------------------------------------
*/

use Gambio\AdminFeed\Services\ShopInformation\Collections\ModuleDetailsCollection;
use Gambio\AdminFeed\Services\ShopInformation\ValueObjects\ModuleDetails;
use PHPUnit\Framework\TestCase;

/**
 * Class ModuleDetailsCollectionTest
 */
class ModuleDetailsCollectionTest extends TestCase
{
	/**
	 * @var \Gambio\AdminFeed\Services\ShopInformation\Collections\ModuleDetailsCollection
	 */
	private $collection;
	
	
	#
	# TESTS
	#
	
	public function testCreation()
	{
		$collection  = ModuleDetailsCollection::create();
		$collection2 = ModuleDetailsCollection::create();
		
		$this->assertNotSame($collection, $collection2, 'Created file system details are identical/the same.');
	}
	
	
	public function testIteration()
	{
		$moduleDetails = $this->createMock(ModuleDetails::class);
		$collection    = ModuleDetailsCollection::create([$moduleDetails]);
		
		$this->assertIteration($collection);
	}
	
	
	public function testCountability()
	{
		$moduleDetails = $this->createMock(ModuleDetails::class);
		$collection    = ModuleDetailsCollection::create([$moduleDetails]);
		
		$this->assertCountability($collection);
	}
	
	
	public function testAccessibility()
	{
		$moduleDetails = [
			$this->createMock(ModuleDetails::class),
			$this->createMock(ModuleDetails::class),
		];
		
		$collection = ModuleDetailsCollection::create([$moduleDetails[0]]);
		
		$collection->add($moduleDetails[1]);
		$this->assertReturnedItems($collection, $moduleDetails);
	}
	
	
	#
	# ASSERTIONS
	#
	
	public function assertIteration(ModuleDetailsCollection $collection)
	{
		foreach($collection as $item)
		{
			$this->assertTrue(true);
			
			return;
		}
		$this->fail('Failed to loop throw module details collection.');
	}
	
	
	public function assertCountability(ModuleDetailsCollection $collection)
	{
		$this->assertCount(1, $collection, 'Collection count did not match expected amount of items.');
	}
	
	
	public function assertReturnedItems(ModuleDetailsCollection $collection, array $items)
	{
		$this->assertEquals($collection->items(), $items, 'Returned module details did not match expected items.');
	}
}