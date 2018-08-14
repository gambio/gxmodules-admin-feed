<?php
/* --------------------------------------------------------------
   ModuleDetailsCollectionBehaviour.inc.php 2018-08-01
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
 * Class ModuleDetailsCollectionBehaviour
 */
class ModuleDetailsCollectionBehaviour extends TestCase
{
	
	/**
	 * @var \Gambio\AdminFeed\Services\ShopInformation\ValueObjects\ModuleDetails
	 */
	private $item;
	
	/**
	 * @var array
	 */
	private $items;
	
	/**
	 * @var \Gambio\AdminFeed\Services\ShopInformation\Collections\ModuleDetailsCollection
	 */
	private $collection;
	
	
	public function setUp()
	{
		$this->item  = $this->createMock(ModuleDetails::class);
		$this->items = [$this->item];
		
		$this->collection = ModuleDetailsCollection::create($this->items);
	}
	
	
	/**
	 * @test
	 */
	public function shouldReturnAllCollectedItems()
	{
		$this->assertEquals($this->collection->items(), $this->items);
	}
	
	
	/**
	 * @test
	 */
	public function shouldReturnTheNumberOfCollectedItems()
	{
		$this->assertCount(count($this->items), $this->collection);
	}
	
	
	/**
	 * @test
	 */
	public function shouldBeAnIterator()
	{
		foreach($this->collection as $item)
		{
			$this->assertTrue(true);
			
			return;
		}
		$this->fail('Failed to loop throw collection.');
	}
}