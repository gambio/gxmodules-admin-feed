<?php
/* --------------------------------------------------------------
   ShopInformation.php 2018-08-01
   Gambio GmbH
   http://www.gambio.de
   Copyright (c) 2018 Gambio GmbH
   Released under the GNU General Public License (Version 2)
   [http://www.gnu.org/licenses/gpl-2.0.html]
   --------------------------------------------------------------
*/

namespace Gambio\AdminFeed\Services\ShopInformation\Entities;

use Gambio\AdminFeed\Services\ShopInformation\ValueObjects\FileSystemDetails;
use Gambio\AdminFeed\Services\ShopInformation\ValueObjects\ModulesDetails;
use Gambio\AdminFeed\Services\ShopInformation\ValueObjects\ServerDetails;
use Gambio\AdminFeed\Services\ShopInformation\ValueObjects\ShopDetails;
use Gambio\AdminFeed\Services\ShopInformation\ValueObjects\TemplateDetails;
use Gambio\AdminFeed\Services\ShopInformation\ValueObjects\MerchantDetails;
use Gambio\AdminFeed\Services\ShopInformation\ValueObjects\UpdatesDetails;

/**
 * Class ShopInformation
 *
 * @package Gambio\AdminFeed\Services\ShopInformation\Entities
 */
class ShopInformation
{
	/**
	 * @param \Gambio\AdminFeed\Services\ShopInformation\ValueObjects\ShopDetails       $shop
	 * @param \Gambio\AdminFeed\Services\ShopInformation\ValueObjects\ServerDetails     $server
	 * @param \Gambio\AdminFeed\Services\ShopInformation\ValueObjects\ModulesDetails    $modules
	 * @param \Gambio\AdminFeed\Services\ShopInformation\ValueObjects\TemplateDetails   $templates
	 * @param \Gambio\AdminFeed\Services\ShopInformation\ValueObjects\FileSystemDetails $filesystem
	 * @param \Gambio\AdminFeed\Services\ShopInformation\ValueObjects\MerchantDetails   $merchant
	 * @param \Gambio\AdminFeed\Services\ShopInformation\ValueObjects\UpdatesDetails    $updates
	 *
	 * @return self
	 */
	static function create(ShopDetails $shop,
	                       ServerDetails $server,
	                       ModulesDetails $modules,
	                       TemplateDetails $templates,
	                       FileSystemDetails $filesystem,
	                       MerchantDetails $merchant,
	                       UpdatesDetails $updates)
	{
	}
	
	
	/**
	 * @return \Gambio\AdminFeed\Services\ShopInformation\ValueObjects\ShopDetails
	 */
	public function shop()
	{
	}
	
	
	/**
	 * @return \Gambio\AdminFeed\Services\ShopInformation\ValueObjects\ServerDetails
	 */
	public function server()
	{
	}
	
	
	/**
	 * @return \Gambio\AdminFeed\Services\ShopInformation\ValueObjects\ModulesDetails
	 */
	public function modules()
	{
	}
	
	
	/**
	 * @return \Gambio\AdminFeed\Services\ShopInformation\ValueObjects\TemplateDetails
	 */
	public function templates()
	{
	}
	
	
	/**
	 * @return \Gambio\AdminFeed\Services\ShopInformation\ValueObjects\FileSystemDetails
	 */
	public function filesystem()
	{
	}
	
	
	/**
	 * @return \Gambio\AdminFeed\Services\ShopInformation\ValueObjects\MerchantDetails
	 */
	public function merchant()
	{
	}
	
	
	/**
	 * @return \Gambio\AdminFeed\Services\ShopInformation\ValueObjects\UpdatesDetails
	 */
	public function updates()
	{
	}
}