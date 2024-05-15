<?php
/* --------------------------------------------------------------
   ShopInformationRepository.php 2019-01-15
   Gambio GmbH
   http://www.gambio.de
   Copyright (c) 2019 Gambio GmbH
   Released under the GNU General Public License (Version 2)
   [http://www.gnu.org/licenses/gpl-2.0.html]
   --------------------------------------------------------------
*/

namespace Gambio\AdminFeed\Services\ShopInformation\Repositories;

use Gambio\AdminFeed\Services\ShopInformation\Entities\ShopInformation;

/**
 * Class ShopInformationRepository
 *
 * @package Gambio\AdminFeed\Services\ShopInformation\Repositories
 */
class ShopInformationRepository
{
	/**
	 * ShopInformationRepository constructor.
	 *
	 * @param \Gambio\AdminFeed\Services\ShopInformation\Repositories\ShopDetailsRepository       $shopDetailsRepository
	 * @param \Gambio\AdminFeed\Services\ShopInformation\Repositories\ServerDetailsRepository     $serverDetailsRepository
	 * @param \Gambio\AdminFeed\Services\ShopInformation\Repositories\ModulesDetailsRepository    $modulesDetailsRepository
	 * @param \Gambio\AdminFeed\Services\ShopInformation\Repositories\TemplateDetailsRepository   $templateDetailsRepository
	 * @param \Gambio\AdminFeed\Services\ShopInformation\Repositories\FileSystemDetailsRepository $fileSystemDetailsRepository
	 * @param \Gambio\AdminFeed\Services\ShopInformation\Repositories\MerchantDetailsRepository   $merchantDetailsRepository
	 * @param \Gambio\AdminFeed\Services\ShopInformation\Repositories\UpdatesDetailsRepository    $updatesDetailsRepository
	 */
	public function __construct(private readonly ShopDetailsRepository $shopDetailsRepository, private readonly ServerDetailsRepository $serverDetailsRepository, private readonly ModulesDetailsRepository $modulesDetailsRepository, private readonly TemplateDetailsRepository $templateDetailsRepository, private readonly FileSystemDetailsRepository $fileSystemDetailsRepository, private readonly UpdatesDetailsRepository $updatesDetailsRepository)
 {
 }
	
	
	/**
	 * Returns the shop information.
	 *
	 * @return \Gambio\AdminFeed\Services\ShopInformation\Entities\ShopInformation
	 */
	public function getShopInformation()
	{
		return ShopInformation::create($this->getShopDetails(), $this->getServerDetails(), $this->getModulesDetails(),
		                               $this->getTemplateDetails(), $this->getFileSystemDetails(),
		                               $this->getUpdatesDetails());
	}
	
	
	/**
	 * Returns the shop details.
	 *
	 * @return \Gambio\AdminFeed\Services\ShopInformation\ValueObjects\ShopDetails
	 */
	public function getShopDetails()
	{
		return $this->shopDetailsRepository->getShopDetails();
	}
	
	
	/**
	 * Returns the server details.
	 *
	 * @return \Gambio\AdminFeed\Services\ShopInformation\ValueObjects\ServerDetails
	 */
	public function getServerDetails()
	{
		return $this->serverDetailsRepository->getServerDetails();
	}
	
	
	/**
	 * Returns the modules details.
	 *
	 * @return \Gambio\AdminFeed\Services\ShopInformation\ValueObjects\ModulesDetails
	 */
	public function getModulesDetails()
	{
		return $this->modulesDetailsRepository->getModulesDetails();
	}
	
	
	/**
	 * Returns templates details.
	 *
	 * @return \Gambio\AdminFeed\Services\ShopInformation\ValueObjects\ThemeDetails
	 */
	public function getTemplateDetails()
	{
		return $this->templateDetailsRepository->getTemplateDetails();
	}
	
	
	/**
	 * Returns the file system details.
	 *
	 * @return \Gambio\AdminFeed\Services\ShopInformation\ValueObjects\FileSystemDetails
	 */
	public function getFileSystemDetails()
	{
		return $this->fileSystemDetailsRepository->getFileSystemDetails();
	}
	
	
	/**
	 * Returns the updates details.
	 *
	 * @return \Gambio\AdminFeed\Services\ShopInformation\ValueObjects\UpdatesDetails
	 */
	public function getUpdatesDetails()
	{
		return $this->updatesDetailsRepository->getUpdatesDetails();
	}
}