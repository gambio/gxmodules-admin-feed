<?php
/* --------------------------------------------------------------
   ShopInformationRepositoryInterface.php 2018-08-01
   Gambio GmbH
   http://www.gambio.de
   Copyright (c) 2018 Gambio GmbH
   Released under the GNU General Public License (Version 2)
   [http://www.gnu.org/licenses/gpl-2.0.html]
   --------------------------------------------------------------
*/

namespace Gambio\AdminFeed\Services\ShopInformation\Repositories\Interfaces;

/**
 * Interface ShopInformationRepositoryInterface
 *
 * @package Gambio\AdminFeed\Services\ShopInformation\Repositories\Interfaces
 */
interface ShopInformationRepositoryInterface
{
	static function create(ShopDetailsRepositoryInterface $shopDetailsRepository,
	                       ServerDetailsRepositoryInterface $serverDetailsRepository,
	                       ModulesDetailsRepositoryInterface $modulesDetailsRepository,
	                       TemplateDetailsRepositoryInterface $templateDetailsRepository,
	                       FileSystemDetailsRepositoryInterface $fileSystemDetailsRepository);
	
	
	/**
	 * @return \Gambio\AdminFeed\Services\ShopInformation\Entities\Interfaces\ShopInformationInterface
	 */
	public function shopInformation();
}