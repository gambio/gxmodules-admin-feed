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
	/**
	 * @param \Gambio\AdminFeed\Services\ShopInformation\Repositories\Interfaces\ShopDetailsRepositoryInterface     $shopDetailsRepository
	 * @param \Gambio\AdminFeed\Services\ShopInformation\Repositories\Interfaces\ServerDetailsRepositoryInterface   $serverDetailsRepository
	 * @param \Gambio\AdminFeed\Services\ShopInformation\Repositories\Interfaces\ModulesDetailsRepositoryInterface  $modulesDetailsRepository
	 * @param \Gambio\AdminFeed\Services\ShopInformation\Repositories\Interfaces\TemplateDetailsRepositoryInterface $templateDetailsRepository
	 * @param \Gambio\AdminFeed\Services\ShopInformation\Repositories\Interfaces\UpdateDetailsRepositoryInterface   $updateDetailsRepository
	 *
	 * @return \Gambio\AdminFeed\Services\ShopInformation\ValueObjects\Interfaces\TemplateDetailsInterface
	 */
	public function create(ShopDetailsRepositoryInterface $shopDetailsRepository,
	                       ServerDetailsRepositoryInterface $serverDetailsRepository,
	                       ModulesDetailsRepositoryInterface $modulesDetailsRepository,
	                       TemplateDetailsRepositoryInterface $templateDetailsRepository,
	                       UpdateDetailsRepositoryInterface $updateDetailsRepository);
	
	
	/**
	 * @return \Gambio\AdminFeed\Services\ShopInformation\Entities\Interfaces\ShopInformationInterface
	 */
	public function shopInformation();
	
	
	/**
	 * @return \Gambio\AdminFeed\Services\ShopInformation\ValueObjects\Interfaces\ShopDetailsInterface
	 */
	public function shopDetails();
	
	
	/**
	 * @return \Gambio\AdminFeed\Services\ShopInformation\ValueObjects\Interfaces\ServerDetailsInterface
	 */
	public function serverDetails();
	
	
	/**
	 * @return \Gambio\AdminFeed\Services\ShopInformation\ValueObjects\Interfaces\ModulesDetailsInterface
	 */
	public function modulesDetails();
	
	
	/**
	 * @return \Gambio\AdminFeed\Services\ShopInformation\ValueObjects\Interfaces\TemplateDetailsInterface
	 */
	public function templateDetails();
	
	
	/**
	 * @return \Gambio\AdminFeed\Services\ShopInformation\ValueObjects\Interfaces\FileSystemDetailsInterface
	 */
	public function fileSystemDetails();
	
	
	/**
	 * @return \Gambio\AdminFeed\Services\ShopInformation\ValueObjects\Interfaces\UpdateDetailsInterface
	 */
	public function updateDetails();
}