<?php
/* --------------------------------------------------------------
   UpdateDetailsCollection.php 2018-08-01
   Gambio GmbH
   http://www.gambio.de
   Copyright (c) 2018 Gambio GmbH
   Released under the GNU General Public License (Version 2)
   [http://www.gnu.org/licenses/gpl-2.0.html]
   --------------------------------------------------------------
*/

namespace Gambio\AdminFeed\Services\ShopInformation\Collections;

use Gambio\AdminFeed\Services\ShopInformation\ValueObjects\UpdateDetails;

/**
 * Class UpdateDetailsCollection
 *
 * @package Gambio\AdminFeed\Services\ShopInformation\Collections
 */
class UpdateDetailsCollection implements \IteratorAggregate, \Countable
{
	/**
	 * @var array
	 */
	private $items = [];
	
	
	/**
	 * ModuleDetailsCollection constructor.
	 *
	 * @param array $items
	 */
	public function __construct(array $items = [])
	{
		foreach($items as $item)
		{
			$this->add($item);
		}
	}
	
	
	/**
	 * @param array $items
	 *
	 * @return self
	 */
	static function create(array $items = [])
	{
		return new self($items);
	}
	
	
	/**
	 * @return array
	 */
	public function items()
	{
		return $this->items;
	}
	
	
	/**
	 * @return \ArrayIterator|\Traversable
	 */
	public function getIterator()
	{
		return new \ArrayIterator($this->items);
	}
	
	
	/**
	 * @return int
	 */
	public function count()
	{
		return count($this->items);
	}
	
	
	/**
	 * @param \Gambio\AdminFeed\Services\ShopInformation\ValueObjects\UpdateDetails $item
	 */
	public function add(UpdateDetails $item)
	{
		$this->items[] = $item;
	}
}