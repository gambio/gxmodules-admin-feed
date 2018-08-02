<?php
/* --------------------------------------------------------------
   ShopInformationServiceInterface.php 2018-08-01
   Gambio GmbH
   http://www.gambio.de
   Copyright (c) 2018 Gambio GmbH
   Released under the GNU General Public License (Version 2)
   [http://www.gnu.org/licenses/gpl-2.0.html]
   --------------------------------------------------------------
*/

namespace Gambio\AdminFeed\Services\ShopInformation\Interfaces;

/**
 * Interface ShopInformationServiceInterface
 *
 * @package Gambio\AdminFeed\Services\ShopInformation\Interfaces
 */
interface ShopInformationServiceInterface
{
	/**
	 * @return \Gambio\AdminFeed\Services\ShopInformation\Entities\Interfaces\ShopInformationInterface
	 */
	public function getShopInformation();
}