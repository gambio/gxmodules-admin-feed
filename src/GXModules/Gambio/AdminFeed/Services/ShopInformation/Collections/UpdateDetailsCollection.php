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
     * UpdateDetailsCollection constructor.
     *
     * @param array $items
     */
    public function __construct(array $items = [])
    {
        foreach ($items as $item) {
            $this->add($item);
        }
    }

    /**
     * Adds an item to this collection.
     *
     * @param \Gambio\AdminFeed\Services\ShopInformation\ValueObjects\UpdateDetails $item
     */
    public function add(UpdateDetails $item): void
    {
        $this->items[] = $item;
    }

    /**
     * Creates and returns a new UpdateDetailsCollection instance.
     *
     * @param array $items
     *
     * @return \Gambio\AdminFeed\Services\ShopInformation\Collections\UpdateDetailsCollection
     */
    static function create(array $items = [])
    {
        return new self($items);
    }

    /**
     * Returns a list of all contained collection items.
     *
     * @return array
     */
    public function items()
    {
        return $this->items;
    }

    /**
     * Returns iterator for this collection.
     *
     * @return \Traversable
     */
    #[\Override]
    public function getIterator(): \Traversable
    {
        return new \ArrayIterator($this->items);
    }

    /**
     * Returns the number of contained items.
     *
     * @return int
     */
    #[\Override]
    public function count()
    {
        return count($this->items);
    }
}