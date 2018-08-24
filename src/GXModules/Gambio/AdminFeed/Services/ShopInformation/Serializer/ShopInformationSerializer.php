<?php
/* --------------------------------------------------------------
   ShopInformationSerializer.php 2018-08-10
   Gambio GmbH
   http://www.gambio.de
   Copyright (c) 2018 Gambio GmbH
   Released under the GNU General Public License (Version 2)
   [http://www.gnu.org/licenses/gpl-2.0.html]
   --------------------------------------------------------------
*/

namespace Gambio\AdminFeed\Services\ShopInformation\Serializer;

use Gambio\AdminFeed\Services\ShopInformation\Entities\ShopInformation;

/**
 * Class ShopInformationSerializer
 *
 * @package Gambio\AdminFeed\Services\ShopInformation\Serializer
 */
class ShopInformationSerializer
{
	/**
	 * @var \Gambio\AdminFeed\Services\ShopInformation\Serializer\ShopDetailsSerializer
	 */
	private $shopDetailsSerializer;
	
	/**
	 * @var \Gambio\AdminFeed\Services\ShopInformation\Serializer\ServerDetailsSerializer
	 */
	private $serverDetailsSerializer;
	
	/**
	 * @var \Gambio\AdminFeed\Services\ShopInformation\Serializer\ModulesDetailsSerializer
	 */
	private $modulesDetailsSerializer;
	
	/**
	 * @var \Gambio\AdminFeed\Services\ShopInformation\Serializer\TemplateDetailsSerializer
	 */
	private $templateDetailsSerializer;
	
	/**
	 * @var \Gambio\AdminFeed\Services\ShopInformation\Serializer\FileSystemDetailsSerializer
	 */
	private $fileSystemDetailsSerializer;
	
	/**
	 * @var \Gambio\AdminFeed\Services\ShopInformation\Serializer\MerchantDetailsSerializer
	 */
	private $merchantDetailsSerializer;
	
	/**
	 * @var \Gambio\AdminFeed\Services\ShopInformation\Serializer\UpdatesDetailsSerializer
	 */
	private $updatesDetailsSerializer;
	
	
	/**
	 * ShopInformationSerializer constructor.
	 *
	 * @param \Gambio\AdminFeed\Services\ShopInformation\Serializer\ShopDetailsSerializer       $shopDetailsSerializer
	 * @param \Gambio\AdminFeed\Services\ShopInformation\Serializer\ServerDetailsSerializer     $serverDetailsSerializer
	 * @param \Gambio\AdminFeed\Services\ShopInformation\Serializer\ModulesDetailsSerializer    $modulesDetailsSerializer
	 * @param \Gambio\AdminFeed\Services\ShopInformation\Serializer\TemplateDetailsSerializer   $templateDetailsSerializer
	 * @param \Gambio\AdminFeed\Services\ShopInformation\Serializer\FileSystemDetailsSerializer $fileSystemDetailsSerializer
	 * @param \Gambio\AdminFeed\Services\ShopInformation\Serializer\MerchantDetailsSerializer   $merchantDetailsSerializer
	 * @param \Gambio\AdminFeed\Services\ShopInformation\Serializer\UpdatesDetailsSerializer    $updatesDetailsSerializer
	 */
	public function __construct(ShopDetailsSerializer $shopDetailsSerializer,
	                            ServerDetailsSerializer $serverDetailsSerializer,
	                            ModulesDetailsSerializer $modulesDetailsSerializer,
	                            TemplateDetailsSerializer $templateDetailsSerializer,
	                            FileSystemDetailsSerializer $fileSystemDetailsSerializer,
	                            MerchantDetailsSerializer $merchantDetailsSerializer,
	                            UpdatesDetailsSerializer $updatesDetailsSerializer
	
	)
	{
		$this->shopDetailsSerializer       = $shopDetailsSerializer;
		$this->serverDetailsSerializer     = $serverDetailsSerializer;
		$this->modulesDetailsSerializer    = $modulesDetailsSerializer;
		$this->templateDetailsSerializer   = $templateDetailsSerializer;
		$this->fileSystemDetailsSerializer = $fileSystemDetailsSerializer;
		$this->merchantDetailsSerializer   = $merchantDetailsSerializer;
		$this->updatesDetailsSerializer    = $updatesDetailsSerializer;
	}
	
	
	/**
	 * @param \Gambio\AdminFeed\Services\ShopInformation\Entities\ShopInformation $shopInformation
	 *
	 * @return array
	 */
	public function serialize(ShopInformation $shopInformation)
	{
		$json = [
			'shop'       => $this->shopDetailsSerializer->serialize($shopInformation->shop()),
			'server'     => $this->serverDetailsSerializer->serialize($shopInformation->server()),
			'modules'    => $this->modulesDetailsSerializer->serialize($shopInformation->modules()),
			'templates'  => $this->templateDetailsSerializer->serialize($shopInformation->templates()),
			'filesystem' => $this->fileSystemDetailsSerializer->serialize($shopInformation->filesystem()),
			'merchant'   => $this->merchantDetailsSerializer->serialize($shopInformation->merchant()),
			'updates'    => $this->updatesDetailsSerializer->serialize($shopInformation->updates()),
		];
		
		return $json;
	}
	
	
	/**
	 * @param string|array $json
	 *
	 * @return \Gambio\AdminFeed\Services\ShopInformation\Entities\ShopInformation
	 */
	public function deserialize($json)
	{
		if(!is_array($json))
		{
			$json = json_decode($json, true);
		}
		
		if(!isset($json['shop'])
		   || !isset($json['server'])
		   || !isset($json['modules'])
		   || !isset($json['templates'])
		   || !isset($json['filesystem'])
		   || !isset($json['merchant'])
		   || !isset($json['updates']))
		{
			throw new \InvalidArgumentException('Given argument is invalid. Needed property is missing.');
		}
		
		$shop       = $this->shopDetailsSerializer->deserialize($json['shop']);
		$server     = $this->serverDetailsSerializer->deserialize($json['server']);
		$modules    = $this->modulesDetailsSerializer->deserialize($json['modules']);
		$templates  = $this->templateDetailsSerializer->deserialize($json['templates']);
		$filesystem = $this->fileSystemDetailsSerializer->deserialize($json['filesystem']);
		$merchant   = $this->merchantDetailsSerializer->deserialize($json['merchant']);
		$updates    = $this->updatesDetailsSerializer->deserialize($json['updates']);
		
		return ShopInformation::create($shop, $server, $modules, $templates, $filesystem, $merchant, $updates);
	}
}