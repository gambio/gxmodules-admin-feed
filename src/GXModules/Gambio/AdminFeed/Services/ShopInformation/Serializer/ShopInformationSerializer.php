<?php
/* --------------------------------------------------------------
   ShopInformationSerializer.php 2019-01-15
   Gambio GmbH
   http://www.gambio.de
   Copyright (c) 2019 Gambio GmbH
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
	 * @var \Gambio\AdminFeed\Services\ShopInformation\Serializer\ThemeDetailsSerializer
	 */
	private $themeDetailsSerializer;
	
	/**
	 * @var \Gambio\AdminFeed\Services\ShopInformation\Serializer\FileSystemDetailsSerializer
	 */
	private $fileSystemDetailsSerializer;
	
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
	 * @param \Gambio\AdminFeed\Services\ShopInformation\Serializer\ThemeDetailsSerializer      $themeDetailsSerializer
	 * @param \Gambio\AdminFeed\Services\ShopInformation\Serializer\FileSystemDetailsSerializer $fileSystemDetailsSerializer
	 * @param \Gambio\AdminFeed\Services\ShopInformation\Serializer\UpdatesDetailsSerializer    $updatesDetailsSerializer
	 */
	public function __construct(ShopDetailsSerializer $shopDetailsSerializer,
	                            ServerDetailsSerializer $serverDetailsSerializer,
	                            ModulesDetailsSerializer $modulesDetailsSerializer,
	                            ThemeDetailsSerializer $themeDetailsSerializer,
	                            FileSystemDetailsSerializer $fileSystemDetailsSerializer,
	                            UpdatesDetailsSerializer $updatesDetailsSerializer
	
	)
	{
		$this->shopDetailsSerializer       = $shopDetailsSerializer;
		$this->serverDetailsSerializer     = $serverDetailsSerializer;
		$this->modulesDetailsSerializer    = $modulesDetailsSerializer;
		$this->themeDetailsSerializer      = $themeDetailsSerializer;
		$this->fileSystemDetailsSerializer = $fileSystemDetailsSerializer;
		$this->updatesDetailsSerializer    = $updatesDetailsSerializer;
	}
	
	
	/**
	 * Serializes a given ShopInformation instance.
	 *
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
			'themes'     => $this->themeDetailsSerializer->serialize($shopInformation->themes()),
			'filesystem' => $this->fileSystemDetailsSerializer->serialize($shopInformation->filesystem()),
			'updates'    => $this->updatesDetailsSerializer->serialize($shopInformation->updates()),
		];
		
		return $json;
	}
	
	
	/**
	 * Returns a new ShopInformation instance by using the data of a given array or json strings.
	 *
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
		
		$neededProperties = [
			'shop',
			'server',
			'modules',
			'themes',
			'filesystem',
			'updates',
		];
		foreach($neededProperties as $property)
		{
			if(!array_key_exists($property, $json))
			{
				throw new \InvalidArgumentException('Property "'.$property.'" is missing.');
			}
		}
		
		$shop       = $this->shopDetailsSerializer->deserialize($json['shop']);
		$server     = $this->serverDetailsSerializer->deserialize($json['server']);
		$modules    = $this->modulesDetailsSerializer->deserialize($json['modules']);
		$themes     = $this->themeDetailsSerializer->deserialize($json['themes']);
		$filesystem = $this->fileSystemDetailsSerializer->deserialize($json['filesystem']);
		$updates    = $this->updatesDetailsSerializer->deserialize($json['updates']);
		
		return ShopInformation::create($shop, $server, $modules, $themes, $filesystem, $updates);
	}
}