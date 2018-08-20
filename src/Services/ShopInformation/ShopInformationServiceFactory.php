<?php
/* --------------------------------------------------------------
   ShopInformationServiceFactory.php 2018-08-10
   Gambio GmbH
   http://www.gambio.de
   Copyright (c) 2018 Gambio GmbH
   Released under the GNU General Public License (Version 2)
   [http://www.gnu.org/licenses/gpl-2.0.html]
   --------------------------------------------------------------
*/

namespace Gambio\AdminFeed\Services\ShopInformation;

use Gambio\AdminFeed\Adapters\GxAdapterTrait;
use Gambio\AdminFeed\Services\ShopInformation\Mapper\FileSystemDetailsMapper;
use Gambio\AdminFeed\Services\ShopInformation\Mapper\MerchantDetailsMapper;
use Gambio\AdminFeed\Services\ShopInformation\Mapper\ModulesDetailsMapper;
use Gambio\AdminFeed\Services\ShopInformation\Mapper\ServerDetailsMapper;
use Gambio\AdminFeed\Services\ShopInformation\Mapper\ShopDetailsMapper;
use Gambio\AdminFeed\Services\ShopInformation\Mapper\TemplateDetailsMapper;
use Gambio\AdminFeed\Services\ShopInformation\Mapper\UpdatesDetailsMapper;
use Gambio\AdminFeed\Services\ShopInformation\Reader\FileSystemDetailsReader;
use Gambio\AdminFeed\Services\ShopInformation\Reader\MerchantDetailsReader;
use Gambio\AdminFeed\Services\ShopInformation\Reader\ModulesDetailsReader;
use Gambio\AdminFeed\Services\ShopInformation\Reader\ServerDetailsReader;
use Gambio\AdminFeed\Services\ShopInformation\Reader\ShopDetailsReader;
use Gambio\AdminFeed\Services\ShopInformation\Reader\TemplateDetailsReader;
use Gambio\AdminFeed\Services\ShopInformation\Reader\UpdatesDetailsReader;
use Gambio\AdminFeed\Services\ShopInformation\Repositories\FileSystemDetailsRepository;
use Gambio\AdminFeed\Services\ShopInformation\Repositories\MerchantDetailsRepository;
use Gambio\AdminFeed\Services\ShopInformation\Repositories\ModulesDetailsRepository;
use Gambio\AdminFeed\Services\ShopInformation\Repositories\ServerDetailsRepository;
use Gambio\AdminFeed\Services\ShopInformation\Repositories\ShopDetailsRepository;
use Gambio\AdminFeed\Services\ShopInformation\Repositories\ShopInformationRepository;
use Gambio\AdminFeed\Services\ShopInformation\Repositories\TemplateDetailsRepository;
use Gambio\AdminFeed\Services\ShopInformation\Repositories\UpdatesDetailsRepository;

/**
 * Class ShopInformationServiceFactory
 *
 * @package Gambio\AdminFeed\Services\ShopInformation
 */
class ShopInformationServiceFactory
{
	use GxAdapterTrait;
	
	
	/**
	 * @var \CI_DB_query_builder
	 */
	private $db;
	
	/**
	 * @var \Gambio\AdminFeed\Services\ShopInformation\Settings
	 */
	private $settings;
	
	/**
	 * @var \Gambio\AdminFeed\Services\ShopInformation\ShopInformationService
	 */
	private $service;
	
	/**
	 * @var \Gambio\AdminFeed\Services\ShopInformation\Repositories\ShopInformationRepository
	 */
	private $shopInformationRepository;
	
	/**
	 * @var \Gambio\AdminFeed\Services\ShopInformation\Repositories\ShopDetailsRepository
	 */
	private $shopDetailsRepository;
	
	/**
	 * @var \Gambio\AdminFeed\Services\ShopInformation\Repositories\ServerDetailsRepository
	 */
	private $serverDetailsRepository;
	
	/**
	 * @var \Gambio\AdminFeed\Services\ShopInformation\Repositories\ModulesDetailsRepository
	 */
	private $modulesDetailsRepository;
	
	/**
	 * @var \Gambio\AdminFeed\Services\ShopInformation\Repositories\TemplateDetailsRepository
	 */
	private $templateDetailsRepository;
	
	/**
	 * @var \Gambio\AdminFeed\Services\ShopInformation\Repositories\FileSystemDetailsRepository
	 */
	private $fileSystemDetailsRepository;
	
	/**
	 * @var \Gambio\AdminFeed\Services\ShopInformation\Repositories\MerchantDetailsRepository
	 */
	private $merchantDetailsRepository;
	
	/**
	 * @var \Gambio\AdminFeed\Services\ShopInformation\Repositories\UpdatesDetailsRepository
	 */
	private $updatesDetailsRepository;
	
	
	/**
	 * @return \Gambio\AdminFeed\Services\ShopInformation\ShopInformationService
	 */
	public function createService()
	{
		if($this->service === null)
		{
			$this->db       = $this->gxAdapter()->getQueryBuilder();
			$this->settings = new Settings();
			
			$this->service = new ShopInformationService($this->createShopInformationRepository());
		}
		
		return $this->service;
	}
	
	
	/**
	 * @return \Gambio\AdminFeed\Services\ShopInformation\Repositories\ShopInformationRepository
	 */
	private function createShopInformationRepository()
	{
		if($this->shopInformationRepository === null)
		{
			$this->shopInformationRepository = new ShopInformationRepository($this->createShopDetailsRepository(),
			                                                                 $this->createServerDetailsRepository(),
			                                                                 $this->createModulesDetailsRepository(),
			                                                                 $this->createTemplateDetailsRepository(),
			                                                                 $this->createFileSystemDetailsRepository(),
			                                                                 $this->createMerchantDetailsRepository(),
			                                                                 $this->createUpdatesDetailsRepository());
		}
		
		return $this->shopInformationRepository;
	}
	
	
	/**
	 * @return \Gambio\AdminFeed\Services\ShopInformation\Repositories\ShopDetailsRepository
	 */
	private function createShopDetailsRepository()
	{
		if($this->shopDetailsRepository === null)
		{
			$reader = new ShopDetailsReader($this->settings, $this->db);
			$mapper = new ShopDetailsMapper($reader);
			
			$this->shopDetailsRepository = new ShopDetailsRepository($mapper);
		}
		
		return $this->shopDetailsRepository;
	}
	
	
	/**
	 * @return \Gambio\AdminFeed\Services\ShopInformation\Repositories\ServerDetailsRepository
	 */
	private function createServerDetailsRepository()
	{
		if($this->serverDetailsRepository === null)
		{
			$reader = new ServerDetailsReader($this->db);
			$mapper = new ServerDetailsMapper($reader);
			
			$this->serverDetailsRepository = new ServerDetailsRepository($mapper);
		}
		
		return $this->serverDetailsRepository;
	}
	
	
	/**
	 * @return \Gambio\AdminFeed\Services\ShopInformation\Repositories\ModulesDetailsRepository
	 */
	private function createModulesDetailsRepository()
	{
		if($this->modulesDetailsRepository === null)
		{
			$reader = new ModulesDetailsReader($this->settings, $this->db);
			$mapper = new ModulesDetailsMapper($reader);
			
			$this->modulesDetailsRepository = new ModulesDetailsRepository($mapper);
		}
		
		return $this->modulesDetailsRepository;
	}
	
	
	/**
	 * @return \Gambio\AdminFeed\Services\ShopInformation\Repositories\TemplateDetailsRepository
	 */
	private function createTemplateDetailsRepository()
	{
		if($this->templateDetailsRepository === null)
		{
			$reader = new TemplateDetailsReader($this->settings);
			$mapper = new TemplateDetailsMapper($reader);
			
			$this->templateDetailsRepository = new TemplateDetailsRepository($mapper);
		}
		
		return $this->templateDetailsRepository;
	}
	
	
	/**
	 * @return \Gambio\AdminFeed\Services\ShopInformation\Repositories\FileSystemDetailsRepository
	 */
	private function createFileSystemDetailsRepository()
	{
		if($this->fileSystemDetailsRepository === null)
		{
			$reader = new FileSystemDetailsReader($this->settings);
			$mapper = new FileSystemDetailsMapper($reader);
			
			$this->fileSystemDetailsRepository = new FileSystemDetailsRepository($mapper);
		}
		
		return $this->fileSystemDetailsRepository;
	}
	
	
	/**
	 * @return \Gambio\AdminFeed\Services\ShopInformation\Repositories\MerchantDetailsRepository
	 */
	private function createMerchantDetailsRepository()
	{
		if($this->merchantDetailsRepository === null)
		{
			$reader = new MerchantDetailsReader($this->db);
			$mapper = new MerchantDetailsMapper($reader);
			
			$this->merchantDetailsRepository = new MerchantDetailsRepository($mapper);
		}
		
		return $this->merchantDetailsRepository;
	}
	
	
	/**
	 * @return \Gambio\AdminFeed\Services\ShopInformation\Repositories\UpdatesDetailsRepository
	 */
	private function createUpdatesDetailsRepository()
	{
		if($this->updatesDetailsRepository === null)
		{
			$reader = new UpdatesDetailsReader($this->db);
			$mapper = new UpdatesDetailsMapper($reader);
			
			$this->updatesDetailsRepository = new UpdatesDetailsRepository($mapper);
		}
		
		return $this->updatesDetailsRepository;
	}
}