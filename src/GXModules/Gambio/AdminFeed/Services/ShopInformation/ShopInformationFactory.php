<?php
/* --------------------------------------------------------------
   ShopInformationFactory.php 2018-08-10
   Gambio GmbH
   http://www.gambio.de
   Copyright (c) 2018 Gambio GmbH
   Released under the GNU General Public License (Version 2)
   [http://www.gnu.org/licenses/gpl-2.0.html]
   --------------------------------------------------------------
*/

namespace Gambio\AdminFeed\Services\ShopInformation;

use Gambio\AdminFeed\Adapters\GxAdapterTrait;
use Gambio\AdminFeed\CurlClient;
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
use Gambio\AdminFeed\Services\ShopInformation\Serializer\FileSystemDetailsSerializer;
use Gambio\AdminFeed\Services\ShopInformation\Serializer\MerchantAddressDetailsSerializer;
use Gambio\AdminFeed\Services\ShopInformation\Serializer\MerchantDetailsSerializer;
use Gambio\AdminFeed\Services\ShopInformation\Serializer\ModuleDetailsSerializer;
use Gambio\AdminFeed\Services\ShopInformation\Serializer\ModulesDetailsSerializer;
use Gambio\AdminFeed\Services\ShopInformation\Serializer\MysqlServerDetailsSerializer;
use Gambio\AdminFeed\Services\ShopInformation\Serializer\PhpServerDetailsSerializer;
use Gambio\AdminFeed\Services\ShopInformation\Serializer\ServerDetailsSerializer;
use Gambio\AdminFeed\Services\ShopInformation\Serializer\ShopDetailsSerializer;
use Gambio\AdminFeed\Services\ShopInformation\Serializer\ShopInformationSerializer;
use Gambio\AdminFeed\Services\ShopInformation\Serializer\TemplateDetailsSerializer;
use Gambio\AdminFeed\Services\ShopInformation\Serializer\UpdateDetailsSerializer;
use Gambio\AdminFeed\Services\ShopInformation\Serializer\UpdatesDetailsSerializer;

/**
 * Class ShopInformationFactory
 *
 * @package Gambio\AdminFeed\Services\ShopInformation
 */
class ShopInformationFactory
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
	 * @var \Gambio\AdminFeed\Services\ShopInformation\Serializer\FileSystemDetailsSerializer
	 */
	private $fileSystemDetailsSerializer;
	
	/**
	 * @var \Gambio\AdminFeed\Services\ShopInformation\Serializer\MerchantAddressDetailsSerializer
	 */
	private $merchantAddressDetailsSerializer;
	
	/**
	 * @var \Gambio\AdminFeed\Services\ShopInformation\Serializer\MerchantDetailsSerializer
	 */
	private $merchantDetailsSerializer;
	
	/**
	 * @var \Gambio\AdminFeed\Services\ShopInformation\Serializer\ModuleDetailsSerializer
	 */
	private $moduleDetailsSerializer;
	
	/**
	 * @var \Gambio\AdminFeed\Services\ShopInformation\Serializer\ModulesDetailsSerializer
	 */
	private $modulesDetailsSerializer;
	
	/**
	 * @var \Gambio\AdminFeed\Services\ShopInformation\Serializer\MysqlServerDetailsSerializer
	 */
	private $mysqlServerDetailsSerializer;
	
	/**
	 * @var \Gambio\AdminFeed\Services\ShopInformation\Serializer\PhpServerDetailsSerializer
	 */
	private $phpServerDetailsSerializer;
	
	/**
	 * @var \Gambio\AdminFeed\Services\ShopInformation\Serializer\ServerDetailsSerializer
	 */
	private $serverDetailsSerializer;
	
	/**
	 * @var \Gambio\AdminFeed\Services\ShopInformation\Serializer\ShopDetailsSerializer
	 */
	private $shopDetailsSerializer;
	
	/**
	 * @var \Gambio\AdminFeed\Services\ShopInformation\Serializer\ShopInformationSerializer
	 */
	private $shopInformationSerializer;
	
	/**
	 * @var \Gambio\AdminFeed\Services\ShopInformation\Serializer\TemplateDetailsSerializer
	 */
	private $templateDetailsSerializer;
	
	/**
	 * @var \Gambio\AdminFeed\Services\ShopInformation\Serializer\UpdateDetailsSerializer
	 */
	private $updateDetailsSerializer;
	
	/**
	 * @var \Gambio\AdminFeed\Services\ShopInformation\Serializer\UpdatesDetailsSerializer
	 */
	private $updatesDetailsSerializer;
	
	
	/**
	 * Returns an instance of the shop information service.
	 *
	 * @return \Gambio\AdminFeed\Services\ShopInformation\ShopInformationService
	 */
	public function createService()
	{
		if($this->service === null)
		{
			$this->db        = $this->gxAdapter()->getQueryBuilder();
			$this->settings  = new Settings();
			$this->hubClient = new HubClient($this->settings, $this->gxAdapter(), new CurlClient());
			
			$this->service = new ShopInformationService($this->createShopInformationRepository());
		}
		
		return $this->service;
	}
	
	
	/**
	 * Returns an instance of the file system details serializer.
	 *
	 * @return \Gambio\AdminFeed\Services\ShopInformation\Serializer\FileSystemDetailsSerializer
	 */
	public function createFileSystemDetailsSerializer()
	{
		if($this->fileSystemDetailsSerializer === null)
		{
			$this->fileSystemDetailsSerializer = new FileSystemDetailsSerializer();
		}
		
		return $this->fileSystemDetailsSerializer;
	}
	
	
	/**
	 * Returns an instance of the merchant address details serializer.
	 *
	 * @return \Gambio\AdminFeed\Services\ShopInformation\Serializer\MerchantAddressDetailsSerializer
	 */
	public function createMerchantAddressDetailsSerializer()
	{
		if($this->merchantAddressDetailsSerializer === null)
		{
			$this->merchantAddressDetailsSerializer = new MerchantAddressDetailsSerializer();
		}
		
		return $this->merchantAddressDetailsSerializer;
	}
	
	
	/**
	 * Returns an instance of the merchant details serializer.
	 *
	 * @return \Gambio\AdminFeed\Services\ShopInformation\Serializer\MerchantDetailsSerializer
	 */
	public function createMerchantDetailsSerializer()
	{
		if($this->merchantDetailsSerializer === null)
		{
			$this->merchantDetailsSerializer = new MerchantDetailsSerializer($this->createMerchantAddressDetailsSerializer());
		}
		
		return $this->merchantDetailsSerializer;
	}
	
	
	/**
	 * Returns an instance of the module details serializer.
	 *
	 * @return \Gambio\AdminFeed\Services\ShopInformation\Serializer\ModuleDetailsSerializer
	 */
	public function createModuleDetailsSerializer()
	{
		if($this->moduleDetailsSerializer === null)
		{
			$this->moduleDetailsSerializer = new ModuleDetailsSerializer();
		}
		
		return $this->moduleDetailsSerializer;
	}
	
	
	/**
	 * Returns an instance of the modules details serializer.
	 *
	 * @return \Gambio\AdminFeed\Services\ShopInformation\Serializer\ModulesDetailsSerializer
	 */
	public function createModulesDetailsSerializer()
	{
		if($this->modulesDetailsSerializer === null)
		{
			$this->modulesDetailsSerializer = new ModulesDetailsSerializer($this->createModuleDetailsSerializer());
		}
		
		return $this->modulesDetailsSerializer;
	}
	
	
	/**
	 * Returns an instance of the mysql server details serializer.
	 *
	 * @return \Gambio\AdminFeed\Services\ShopInformation\Serializer\MysqlServerDetailsSerializer
	 */
	public function createMysqlServerDetailsSerializer()
	{
		if($this->mysqlServerDetailsSerializer === null)
		{
			$this->mysqlServerDetailsSerializer = new MysqlServerDetailsSerializer();
		}
		
		return $this->mysqlServerDetailsSerializer;
	}
	
	
	/**
	 * Returns an instance of the php server details serializer.
	 *
	 * @return \Gambio\AdminFeed\Services\ShopInformation\Serializer\PhpServerDetailsSerializer
	 */
	public function createPhpServerDetailsSerializer()
	{
		if($this->phpServerDetailsSerializer === null)
		{
			$this->phpServerDetailsSerializer = new PhpServerDetailsSerializer();
		}
		
		return $this->phpServerDetailsSerializer;
	}
	
	
	/**
	 * Returns an instance of the server details serializer.
	 *
	 * @return \Gambio\AdminFeed\Services\ShopInformation\Serializer\ServerDetailsSerializer
	 */
	public function createServerDetailsSerializer()
	{
		if($this->serverDetailsSerializer === null)
		{
			$this->serverDetailsSerializer = new ServerDetailsSerializer($this->createPhpServerDetailsSerializer(),
			                                                             $this->createMysqlServerDetailsSerializer());
		}
		
		return $this->serverDetailsSerializer;
	}
	
	
	/**
	 * Returns an instance of the shop details serializer.
	 *
	 * @return \Gambio\AdminFeed\Services\ShopInformation\Serializer\ShopDetailsSerializer
	 */
	public function createShopDetailsSerializer()
	{
		if($this->shopDetailsSerializer === null)
		{
			$this->shopDetailsSerializer = new ShopDetailsSerializer();
		}
		
		return $this->shopDetailsSerializer;
	}
	
	
	/**
	 * Returns an instance of the shop information serializer.
	 *
	 * @return \Gambio\AdminFeed\Services\ShopInformation\Serializer\ShopInformationSerializer
	 */
	public function createShopInformationSerializer()
	{
		if($this->shopInformationSerializer === null)
		{
			$this->shopInformationSerializer = new ShopInformationSerializer($this->createShopDetailsSerializer(),
			                                                                 $this->createServerDetailsSerializer(),
			                                                                 $this->createModulesDetailsSerializer(),
			                                                                 $this->createTemplateDetailsSerializer(),
			                                                                 $this->createFileSystemDetailsSerializer(),
			                                                                 $this->createMerchantDetailsSerializer(),
			                                                                 $this->createUpdatesDetailsSerializer());
		}
		
		return $this->shopInformationSerializer;
	}
	
	
	/**
	 * Returns an instance of the template details serializer.
	 *
	 * @return \Gambio\AdminFeed\Services\ShopInformation\Serializer\TemplateDetailsSerializer
	 */
	public function createTemplateDetailsSerializer()
	{
		if($this->templateDetailsSerializer === null)
		{
			$this->templateDetailsSerializer = new TemplateDetailsSerializer();
		}
		
		return $this->templateDetailsSerializer;
	}
	
	
	/**
	 * Returns an instance of the update details serializer.
	 *
	 * @return \Gambio\AdminFeed\Services\ShopInformation\Serializer\UpdateDetailsSerializer
	 */
	public function createUpdateDetailsSerializer()
	{
		if($this->updateDetailsSerializer === null)
		{
			$this->updateDetailsSerializer = new UpdateDetailsSerializer();
		}
		
		return $this->updateDetailsSerializer;
	}
	
	
	/**
	 * Returns an instance of the updates details serializer.
	 *
	 * @return \Gambio\AdminFeed\Services\ShopInformation\Serializer\UpdatesDetailsSerializer
	 */
	public function createUpdatesDetailsSerializer()
	{
		if($this->updatesDetailsSerializer === null)
		{
			$this->updatesDetailsSerializer = new UpdatesDetailsSerializer($this->createUpdateDetailsSerializer());
		}
		
		return $this->updatesDetailsSerializer;
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
			$reader = new ModulesDetailsReader($this->settings, $this->db, $this->hubClient);
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