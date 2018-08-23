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
use Gambio\AdminFeed\Services\ShopInformation\Repositories\TokenRepository;

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
	private $shopInformationRepository;
	
	/**
	 * @var \Gambio\AdminFeed\Services\ShopInformation\Repositories\TokenRepository
	 */
	private $tokenRepository;
	
	
	/**
	 * ShopInformationService constructor.
	 *
	 * @param \Gambio\AdminFeed\Services\ShopInformation\Repositories\ShopInformationRepository $shopInformationRepository
	 * @param \Gambio\AdminFeed\Services\ShopInformation\Repositories\TokenRepository           $tokenRepository
	 */
	public function __construct(ShopInformationRepository $shopInformationRepository, TokenRepository $tokenRepository)
	{
		$this->shopInformationRepository = $shopInformationRepository;
		$this->tokenRepository           = $tokenRepository;
	}
	
	
	/**
	 * @return string
	 */
	public function createRequestToken()
	{
		$token = uniqid();
		
		$this->tokenRepository->addToken($token);
		
		return $token;
	}
	
	
	/**
	 * @param string $token
	 *
	 * @return bool
	 */
	public function verifyRequestToken($token)
	{
		return $this->tokenRepository->verifyToken($token);
	}
	
	
	/**
	 * @return \Gambio\AdminFeed\Services\ShopInformation\Entities\ShopInformation
	 */
	public function getShopInformation()
	{
		return ShopInformation::create($this->getShopDetails(), $this->getServerDetails(), $this->getModulesDetails(),
		                               $this->getTemplateDetails(), $this->getFileSystemDetails(),
		                               $this->getMerchantDetails(), $this->getUpdatesDetails());
	}
	
	
	/**
	 * @return \Gambio\AdminFeed\Services\ShopInformation\ValueObjects\ShopDetails
	 */
	public function getShopDetails()
	{
		return $this->shopInformationRepository->getShopDetails();
	}
	
	
	/**
	 * @return \Gambio\AdminFeed\Services\ShopInformation\ValueObjects\ServerDetails
	 */
	public function getServerDetails()
	{
		return $this->shopInformationRepository->getServerDetails();
	}
	
	
	/**
	 * @return \Gambio\AdminFeed\Services\ShopInformation\ValueObjects\ModulesDetails
	 */
	public function getModulesDetails()
	{
		return $this->shopInformationRepository->getModulesDetails();
	}
	
	
	/**
	 * @return \Gambio\AdminFeed\Services\ShopInformation\ValueObjects\TemplateDetails
	 */
	public function getTemplateDetails()
	{
		return $this->shopInformationRepository->getTemplateDetails();
	}
	
	
	/**
	 * @return \Gambio\AdminFeed\Services\ShopInformation\ValueObjects\FileSystemDetails
	 */
	public function getFileSystemDetails()
	{
		return $this->shopInformationRepository->getFileSystemDetails();
	}
	
	
	/**
	 * @return \Gambio\AdminFeed\Services\ShopInformation\ValueObjects\MerchantDetails
	 */
	public function getMerchantDetails()
	{
		return $this->shopInformationRepository->getMerchantDetails();
	}
	
	
	/**
	 * @return \Gambio\AdminFeed\Services\ShopInformation\ValueObjects\UpdatesDetails
	 */
	public function getUpdatesDetails()
	{
		return $this->shopInformationRepository->getUpdatesDetails();
	}
}