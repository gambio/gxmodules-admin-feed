<?php
/* --------------------------------------------------------------
   ModulesDetails.php 2018-08-01
   Gambio GmbH
   http://www.gambio.de
   Copyright (c) 2018 Gambio GmbH
   Released under the GNU General Public License (Version 2)
   [http://www.gnu.org/licenses/gpl-2.0.html]
   --------------------------------------------------------------
*/

namespace Gambio\AdminFeed\Services\ShopInformation\ValueObjects;

use Gambio\AdminFeed\Services\ShopInformation\Collections\ModuleDetailsCollection;
use Gambio\AdminFeed\Services\ShopInformation\ValueObjects\Interfaces\ModulesDetailsInterface;

/**
 * Class ModulesDetails
 *
 * @package Gambio\AdminFeed\Services\ShopInformation\ValueObjects
 */
class ModulesDetails implements ModulesDetailsInterface
{
	/**
	 * @var \Gambio\AdminFeed\Services\ShopInformation\Collections\ModuleDetailsCollection
	 */
	private $payment;
	
	/**
	 * @var \Gambio\AdminFeed\Services\ShopInformation\Collections\ModuleDetailsCollection
	 */
	private $shipping;
	
	/**
	 * @var \Gambio\AdminFeed\Services\ShopInformation\Collections\ModuleDetailsCollection
	 */
	private $orderTotal;
	
	/**
	 * @var \Gambio\AdminFeed\Services\ShopInformation\Collections\ModuleDetailsCollection
	 */
	private $hub;
	
	
	/**
	 * @param \Gambio\AdminFeed\Services\ShopInformation\Collections\ModuleDetailsCollection $hub
	 * @param \Gambio\AdminFeed\Services\ShopInformation\Collections\ModuleDetailsCollection $payment
	 * @param \Gambio\AdminFeed\Services\ShopInformation\Collections\ModuleDetailsCollection $shipping
	 * @param \Gambio\AdminFeed\Services\ShopInformation\Collections\ModuleDetailsCollection $orderTotal
	 */
	public function __construct(ModuleDetailsCollection $hub,
	                            ModuleDetailsCollection $payment,
	                            ModuleDetailsCollection $shipping,
	                            ModuleDetailsCollection $orderTotal)
	{
		$this->hub        = $hub;
		$this->payment    = $payment;
		$this->shipping   = $shipping;
		$this->orderTotal = $orderTotal;
	}
	
	
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
	                       ModuleDetailsCollection $orderTotal)
	{
		return new self($hub, $payment, $shipping, $orderTotal);
	}
	
	
	/**
	 * @return \Gambio\AdminFeed\Services\ShopInformation\Collections\ModuleDetailsCollection
	 */
	public function hub()
	{
		return $this->hub;
	}
	
	
	/**
	 * @return \Gambio\AdminFeed\Services\ShopInformation\Collections\ModuleDetailsCollection
	 */
	public function payment()
	{
		return $this->payment;
	}
	
	
	/**
	 * @return \Gambio\AdminFeed\Services\ShopInformation\Collections\ModuleDetailsCollection
	 */
	public function shipping()
	{
		return $this->shipping;
	}
	
	
	/**
	 * @return \Gambio\AdminFeed\Services\ShopInformation\Collections\ModuleDetailsCollection
	 */
	public function orderTotal()
	{
		return $this->orderTotal;
	}
}