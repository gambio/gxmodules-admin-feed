<?php
/* --------------------------------------------------------------
   ShopInformationRepository.php 2018-08-01
   Gambio GmbH
   http://www.gambio.de
   Copyright (c) 2018 Gambio GmbH
   Released under the GNU General Public License (Version 2)
   [http://www.gnu.org/licenses/gpl-2.0.html]
   --------------------------------------------------------------
*/

namespace Gambio\AdminFeed\Services\ShopInformation\Repositories;

/**
 * Class ShopInformationRepository
 *
 * @package Gambio\AdminFeed\Services\ShopInformation\Repositories
 */
class ShopInformationRepository
{
	/**
	 * @param \Gambio\AdminFeed\Services\ShopInformation\Repositories\ShopDetailsRepository     $shopDetailsRepository
	 * @param \Gambio\AdminFeed\Services\ShopInformation\Repositories\ServerDetailsRepository   $serverDetailsRepository
	 * @param \Gambio\AdminFeed\Services\ShopInformation\Repositories\ModulesDetailsRepository  $modulesDetailsRepository
	 * @param \Gambio\AdminFeed\Services\ShopInformation\Repositories\TemplateDetailsRepository $templateDetailsRepository
	 * @param \Gambio\AdminFeed\Services\ShopInformation\Repositories\UpdateDetailsRepository   $updateDetailsRepository
	 *
	 * @return self
	 */
	static function create(ShopDetailsRepository $shopDetailsRepository,
	                       ServerDetailsRepository $serverDetailsRepository,
	                       ModulesDetailsRepository $modulesDetailsRepository,
	                       TemplateDetailsRepository $templateDetailsRepository,
	                       UpdateDetailsRepository $updateDetailsRepository)
	{
	}
	
	
	/**
	 * @return \Gambio\AdminFeed\Services\ShopInformation\Entities\ShopInformation
	 */
	public function shopInformation()
	{
	}
	
	
	/**
	 * @return \Gambio\AdminFeed\Services\ShopInformation\ValueObjects\ShopDetails
	 */
	public function shopDetails()
	{
	}
	
	
	/**
	 * @return \Gambio\AdminFeed\Services\ShopInformation\ValueObjects\ServerDetails
	 */
	public function serverDetails()
	{
	}
	
	
	/**
	 * @return \Gambio\AdminFeed\Services\ShopInformation\ValueObjects\ModulesDetails
	 */
	public function modulesDetails()
	{
	}
	
	
	/**
	 * @return \Gambio\AdminFeed\Services\ShopInformation\ValueObjects\TemplateDetails
	 */
	public function templateDetails()
	{
	}
	
	
	/**
	 * @return \Gambio\AdminFeed\Services\ShopInformation\ValueObjects\FileSystemDetails
	 */
	public function fileSystemDetails()
	{
	}
	
	
	/**
	 * @return \Gambio\AdminFeed\Services\ShopInformation\ValueObjects\UpdateDetails
	 */
	public function updateDetails()
	{
	}
}