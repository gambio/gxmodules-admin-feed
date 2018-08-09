<?php
/* --------------------------------------------------------------
   ServerDetailsRepositoryInterface.php 2018-08-01
   Gambio GmbH
   http://www.gambio.de
   Copyright (c) 2018 Gambio GmbH
   Released under the GNU General Public License (Version 2)
   [http://www.gnu.org/licenses/gpl-2.0.html]
   --------------------------------------------------------------
*/

namespace Gambio\AdminFeed\Services\ShopInformation\Repositories\Interfaces;

/**
 * Interface ServerDetailsRepositoryInterface
 *
 * @package Gambio\AdminFeed\Services\ShopInformation\Repositories\Interfaces
 */
interface ServerDetailsRepositoryInterface
{
	/**
	 * @return \Gambio\AdminFeed\Services\ShopInformation\ValueObjects\Interfaces\ServerDetailsInterface
	 */
	public function serverDetails();
}