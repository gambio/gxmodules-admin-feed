<?php
/* --------------------------------------------------------------
   ShopDetailsRepositoryInterface.php 2018-08-01
   Gambio GmbH
   http://www.gambio.de
   Copyright (c) 2018 Gambio GmbH
   Released under the GNU General Public License (Version 2)
   [http://www.gnu.org/licenses/gpl-2.0.html]
   --------------------------------------------------------------
*/

namespace Gambio\AdminFeed\Services\ShopInformation\Repositories\Interfaces;

/**
 * Interface ShopDetailsRepositoryInterface
 *
 * @package Gambio\AdminFeed\Services\ShopInformation\Repositories\Interfaces
 */
interface ShopDetailsRepositoryInterface
{
	/**
	 * @return \Gambio\AdminFeed\Services\ShopInformation\ValueObjects\Interfaces\ShopDetailsInterface
	 */
	public function shopDetails();
}