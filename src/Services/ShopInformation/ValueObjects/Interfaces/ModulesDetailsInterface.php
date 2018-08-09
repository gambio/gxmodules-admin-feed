<?php
/* --------------------------------------------------------------
   ModulesDetailsInterface.php 2018-08-01
   Gambio GmbH
   http://www.gambio.de
   Copyright (c) 2018 Gambio GmbH
   Released under the GNU General Public License (Version 2)
   [http://www.gnu.org/licenses/gpl-2.0.html]
   --------------------------------------------------------------
*/

namespace Gambio\AdminFeed\Services\ShopInformation\ValueObjects\Interfaces;

use Gambio\AdminFeed\Services\ShopInformation\Collections\ModuleDetailsCollection;

/**
 * Interface ModulesDetailsInterface
 *
 * @package Gambio\AdminFeed\Services\ShopInformation\ValueObjects\Interfaces
 */
interface ModulesDetailsInterface
{
	/**
	 * @param \Gambio\AdminFeed\Services\ShopInformation\Collections\ModuleDetailsCollection $hub
	 * @param \Gambio\AdminFeed\Services\ShopInformation\Collections\ModuleDetailsCollection $payment
	 * @param \Gambio\AdminFeed\Services\ShopInformation\Collections\ModuleDetailsCollection $shipping
	 * @param \Gambio\AdminFeed\Services\ShopInformation\Collections\ModuleDetailsCollection $orderTotal
	 *
	 * @return self
	 */
	static function create(ModuleDetailsCollection $hub,
	                       ModuleDetailsCollection $payment,
	                       ModuleDetailsCollection $shipping,
	                       ModuleDetailsCollection $orderTotal);
	
	
	/**
	 * @return \Gambio\AdminFeed\Services\ShopInformation\Collections\ModuleDetailsCollection
	 */
	public function hub();
	
	
	/**
	 * @return \Gambio\AdminFeed\Services\ShopInformation\Collections\ModuleDetailsCollection
	 */
	public function payment();
	
	
	/**
	 * @return \Gambio\AdminFeed\Services\ShopInformation\Collections\ModuleDetailsCollection
	 */
	public function shipping();
	
	
	/**
	 * @return \Gambio\AdminFeed\Services\ShopInformation\Collections\ModuleDetailsCollection
	 */
	public function orderTotal();
	
}