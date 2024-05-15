<?php
/* --------------------------------------------------------------
   UpdatesDetails.php 2018-08-01
   Gambio GmbH
   http://www.gambio.de
   Copyright (c) 2018 Gambio GmbH
   Released under the GNU General Public License (Version 2)
   [http://www.gnu.org/licenses/gpl-2.0.html]
   --------------------------------------------------------------
*/

namespace Gambio\AdminFeed\Services\ShopInformation\ValueObjects;

use Gambio\AdminFeed\Services\ShopInformation\Collections\UpdateDetailsCollection;

/**
 * Class UpdatesDetails
 *
 * @package Gambio\AdminFeed\Services\ShopInformation\ValueObjects
 */
class UpdatesDetails
{
	/**
	 * UpdatesDetails constructor.
	 *
	 * @param \Gambio\AdminFeed\Services\ShopInformation\Collections\UpdateDetailsCollection $installed
	 * @param \Gambio\AdminFeed\Services\ShopInformation\Collections\UpdateDetailsCollection $downloaded
	 */
	public function __construct(private readonly UpdateDetailsCollection $installed, private readonly UpdateDetailsCollection $downloaded)
 {
 }
	
	
	/**
	 * Creates and returns a new UpdatesDetails instance.
	 *
	 * @param \Gambio\AdminFeed\Services\ShopInformation\Collections\UpdateDetailsCollection $installed
	 * @param \Gambio\AdminFeed\Services\ShopInformation\Collections\UpdateDetailsCollection $downloaded
	 *
	 * @return \Gambio\AdminFeed\Services\ShopInformation\ValueObjects\UpdatesDetails
	 */
	static function create(UpdateDetailsCollection $installed, UpdateDetailsCollection $downloaded)
	{
		return new self($installed, $downloaded);
	}
	
	
	/**
	 * Returns a collection of installed updates.
	 *
	 * @return \Gambio\AdminFeed\Services\ShopInformation\Collections\UpdateDetailsCollection
	 */
	public function installed()
	{
		return $this->installed;
	}
	
	
	/**
	 * Returns a collection of updates, that had been downloaded with the AutoUpdater but not yet installed.
	 *
	 * @return \Gambio\AdminFeed\Services\ShopInformation\Collections\UpdateDetailsCollection
	 */
	public function downloaded()
	{
		return $this->downloaded;
	}
}