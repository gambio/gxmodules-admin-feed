<?php
/* --------------------------------------------------------------
   ShopInformationService.php 2018-08-10
   Gambio GmbH
   http://www.gambio.de
   Copyright (c) 2018 Gambio GmbH
   Released under the GNU General Public License (Version 2)
   [http://www.gnu.org/licenses/gpl-2.0.html]
   --------------------------------------------------------------
*/

namespace Gambio\AdminFeed\Services\ShopInformation;

use Gambio\AdminFeed\Services\ShopInformation\Entities\ShopInformation;
use Gambio\AdminFeed\Services\ShopInformation\Repositories\ShopInformationRepository;

/**
 * Class ShopInformationService
 *
 * @package Gambio\AdminFeed\Services\ShopInformation
 */
class ShopInformationService
{
	/**
	 * @var \Gambio\AdminFeed\Services\ShopInformation\Repositories\ShopInformationRepository
	 */
	private $repository;
	
	
	/**
	 * ShopInformationService constructor.
	 *
	 * @param \Gambio\AdminFeed\Services\ShopInformation\Repositories\ShopInformationRepository $repository
	 */
	public function __construct(ShopInformationRepository $repository)
	{
		$this->repository = $repository;
	}
	
	
	/**
	 * Returns the all information of the shop.
	 *
	 * @return \Gambio\AdminFeed\Services\ShopInformation\Entities\ShopInformation
	 */
	public function getShopInformation()
	{
		return ShopInformation::create($this->getShopDetails(), $this->getServerDetails(), $this->getModulesDetails(),
		                               $this->getTemplateDetails(), $this->getFileSystemDetails(),
		                               $this->getMerchantDetails(), $this->getUpdatesDetails());
	}
	
	
	/**
	 * Returns the shop details of the shop.
	 *
	 * @return \Gambio\AdminFeed\Services\ShopInformation\ValueObjects\ShopDetails
	 */
	public function getShopDetails()
	{
		return $this->repository->getShopDetails();
	}
	
	
	/**
	 * Returns the server details of the shop.
	 *
	 * @return \Gambio\AdminFeed\Services\ShopInformation\ValueObjects\ServerDetails
	 */
	public function getServerDetails()
	{
		return $this->repository->getServerDetails();
	}
	
	
	/**
	 * Returns the modules details of the shop.
	 *
	 * @return \Gambio\AdminFeed\Services\ShopInformation\ValueObjects\ModulesDetails
	 */
	public function getModulesDetails()
	{
		return $this->repository->getModulesDetails();
	}
	
	
	/**
	 * Returns the template details of the shop.
	 *
	 * @return \Gambio\AdminFeed\Services\ShopInformation\ValueObjects\TemplateDetails
	 */
	public function getTemplateDetails()
	{
		return $this->repository->getTemplateDetails();
	}
	
	
	/**
	 * Returns the file system details of the shop.
	 *
	 * @return \Gambio\AdminFeed\Services\ShopInformation\ValueObjects\FileSystemDetails
	 */
	public function getFileSystemDetails()
	{
		return $this->repository->getFileSystemDetails();
	}
	
	
	/**
	 * Returns the merchant details of this shop.
	 *
	 * @return \Gambio\AdminFeed\Services\ShopInformation\ValueObjects\MerchantDetails
	 */
	public function getMerchantDetails()
	{
		return $this->repository->getMerchantDetails();
	}
	
	
	/**
	 * Returns the update details of this shop.
	 *
	 * @return \Gambio\AdminFeed\Services\ShopInformation\ValueObjects\UpdatesDetails
	 */
	public function getUpdatesDetails()
	{
		return $this->repository->getUpdatesDetails();
	}
}