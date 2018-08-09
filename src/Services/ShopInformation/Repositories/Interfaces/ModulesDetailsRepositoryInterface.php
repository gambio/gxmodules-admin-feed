<?php
/* --------------------------------------------------------------
   ModulesDetailsRepositoryInterface.php 2018-08-01
   Gambio GmbH
   http://www.gambio.de
   Copyright (c) 2018 Gambio GmbH
   Released under the GNU General Public License (Version 2)
   [http://www.gnu.org/licenses/gpl-2.0.html]
   --------------------------------------------------------------
*/

namespace Gambio\AdminFeed\Services\ShopInformation\Repositories\Interfaces;

/**
 * Interface ModulesDetailsRepositoryInterface
 *
 * @package Gambio\AdminFeed\Services\ShopInformation\Repositories\Interfaces
 */
interface ModulesDetailsRepositoryInterface
{
	/**
	 * @return \Gambio\AdminFeed\Services\ShopInformation\ValueObjects\Interfaces\ModulesDetailsInterface
	 */
	public function modulesDetails();
}