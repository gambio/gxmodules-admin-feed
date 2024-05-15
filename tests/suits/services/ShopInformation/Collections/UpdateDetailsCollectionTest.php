<?php
/* --------------------------------------------------------------
   UpdateDetailsCollectionTest.inc.php 2018-08-01
   Gambio GmbH
   http://www.gambio.de
   Copyright (c) 2018 Gambio GmbH
   Released under the GNU General Public License (Version 2)
   [http://www.gnu.org/licenses/gpl-2.0.html]
   --------------------------------------------------------------
*/

use Gambio\AdminFeed\Services\ShopInformation\Collections\UpdateDetailsCollection;
use Gambio\AdminFeed\Services\ShopInformation\ValueObjects\UpdateDetails;
use PHPUnit\Framework\TestCase;

/**
 * Class UpdateDetailsCollectionTest
 */
class UpdateDetailsCollectionTest extends TestCase
{
	
	/**
	 * @var \Gambio\AdminFeed\Services\ShopInformation\ValueObjects\UpdateDetails
	 */
	private $item;
	
	/**
	 * @var array
	 */
	private $items;
	
	/**
	 * @var \Gambio\AdminFeed\Services\ShopInformation\Collections\UpdateDetailsCollection
	 */
	private $collection;
	
	
	#[\Override]
 public function setUp()
	{
		$this->item  = $this->createMock(UpdateDetails::class);
		$this->items = [$this->item];
		
		$this->collection = UpdateDetailsCollection::create($this->items);
	}
	
	
	/**
	 * @test
	 */
	public function shouldReturnAllCollectedItems(): void
	{
		$this->assertEquals($this->collection->items(), $this->items);
	}
	
	
	/**
	 * @test
	 */
	public function shouldReturnTheNumberOfCollectedItems(): void
	{
		$this->assertCount(count($this->items), $this->collection);
	}
	
	
	/**
	 * @test
	 */
	public function shouldBeAnIterator(): void
	{
		foreach($this->collection as $item)
		{
			$this->assertTrue(true);
			
			return;
		}
		$this->fail('Failed to loop throw collection.');
	}
}