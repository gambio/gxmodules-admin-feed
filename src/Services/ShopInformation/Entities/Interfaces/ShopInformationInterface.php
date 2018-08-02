<?php
/* --------------------------------------------------------------
   ShopInformationInterface.php 2018-08-01
   Gambio GmbH
   http://www.gambio.de
   Copyright (c) 2018 Gambio GmbH
   Released under the GNU General Public License (Version 2)
   [http://www.gnu.org/licenses/gpl-2.0.html]
   --------------------------------------------------------------
*/

namespace Gambio\AdminFeed\Services\ShopInformation\Entities\Interfaces;

use Gambio\AdminFeed\Services\ShopInformation\ValueObjects\Interfaces\FileSystemDetailsInterface;
use Gambio\AdminFeed\Services\ShopInformation\ValueObjects\Interfaces\ModulesDetailsInterface;
use Gambio\AdminFeed\Services\ShopInformation\ValueObjects\Interfaces\ServerDetailsInterface;
use Gambio\AdminFeed\Services\ShopInformation\ValueObjects\Interfaces\ShopDetailsInterface;
use Gambio\AdminFeed\Services\ShopInformation\ValueObjects\Interfaces\TemplateDetailsInterface;

/**
 * Interface ShopInformationInterface
 *
 * @package Gambio\AdminFeed\Services\ShopInformation\Entities\Interfaces
 */
interface ShopInformationInterface
{
	/**
	 * @param \Gambio\AdminFeed\Services\ShopInformation\ValueObjects\Interfaces\ShopDetailsInterface       $shop
	 * @param \Gambio\AdminFeed\Services\ShopInformation\ValueObjects\Interfaces\ServerDetailsInterface     $server
	 * @param \Gambio\AdminFeed\Services\ShopInformation\ValueObjects\Interfaces\ModulesDetailsInterface    $modules
	 * @param \Gambio\AdminFeed\Services\ShopInformation\ValueObjects\Interfaces\TemplateDetailsInterface   $templates
	 * @param \Gambio\AdminFeed\Services\ShopInformation\ValueObjects\Interfaces\FileSystemDetailsInterface $filesystem
	 *
	 * @return self
	 */
	static function create(ShopDetailsInterface $shop,
	                       ServerDetailsInterface $server,
	                       ModulesDetailsInterface $modules,
	                       TemplateDetailsInterface $templates,
	                       FileSystemDetailsInterface $filesystem);
	
	
	/**
	 * @return \Gambio\AdminFeed\Services\ShopInformation\ValueObjects\Interfaces\ShopDetailsInterface
	 */
	public function shop();
	
	
	/**
	 * @return \Gambio\AdminFeed\Services\ShopInformation\ValueObjects\Interfaces\ServerDetailsInterface
	 */
	public function server();
	
	
	/**
	 * @return \Gambio\AdminFeed\Services\ShopInformation\ValueObjects\Interfaces\ModulesDetailsInterface
	 */
	public function modules();
	
	
	/**
	 * @return \Gambio\AdminFeed\Services\ShopInformation\ValueObjects\Interfaces\TemplateDetailsInterface
	 */
	public function templates();
	
	
	/**
	 * @return \Gambio\AdminFeed\Services\ShopInformation\ValueObjects\Interfaces\FileSystemDetailsInterface
	 */
	public function filesystem();
}