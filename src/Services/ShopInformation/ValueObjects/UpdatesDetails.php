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
	 * @var \Gambio\AdminFeed\Services\ShopInformation\Collections\UpdateDetailsCollection
	 */
	private $installed;
	
	/**
	 * @var \Gambio\AdminFeed\Services\ShopInformation\Collections\UpdateDetailsCollection
	 */
	private $downloaded;
	
	
	/**
	 * UpdatesDetails constructor.
	 *
	 * @param \Gambio\AdminFeed\Services\ShopInformation\Collections\UpdateDetailsCollection $installed
	 * @param \Gambio\AdminFeed\Services\ShopInformation\Collections\UpdateDetailsCollection $downloaded
	 */
	public function __construct(UpdateDetailsCollection $installed, UpdateDetailsCollection $downloaded)
	{
		$this->installed  = $installed;
		$this->downloaded = $downloaded;
	}
	
	
	/**
	 * @param \Gambio\AdminFeed\Services\ShopInformation\Collections\UpdateDetailsCollection $installed
	 * @param \Gambio\AdminFeed\Services\ShopInformation\Collections\UpdateDetailsCollection $downloaded
	 *
	 * @return self
	 */
	static function create(UpdateDetailsCollection $installed, UpdateDetailsCollection $downloaded)
	{
		return new self($installed, $downloaded);
	}
	
	
	/**
	 * @return \Gambio\AdminFeed\Services\ShopInformation\Collections\UpdateDetailsCollection
	 */
	public function installed()
	{
		return $this->installed;
	}
	
	
	/**
	 * @return \Gambio\AdminFeed\Services\ShopInformation\Collections\UpdateDetailsCollection
	 */
	public function downloaded()
	{
		return $this->downloaded;
	}
}