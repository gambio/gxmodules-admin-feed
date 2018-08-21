<?php
/* --------------------------------------------------------------
   Settings.php 2018-08-10
   Gambio GmbH
   http://www.gambio.de
   Copyright (c) 2018 Gambio GmbH
   Released under the GNU General Public License (Version 2)
   [http://www.gnu.org/licenses/gpl-2.0.html]
   --------------------------------------------------------------
*/

namespace Gambio\AdminFeed\Services\ShopInformation;

/**
 * Class Settings
 *
 * @package Gambio\AdminFeed\Services\ShopInformation
 */
class Settings
{
	public function getBaseDirectory()
	{
		return defined('DIR_FS_CATALOG') ? DIR_FS_CATALOG : '';
	}
	
	
	public function getCurrentTemplate()
	{
		return defined('CURRENT_TEMPLATE') ? CURRENT_TEMPLATE : '';
	}
	
	
	public function getHttpServer()
	{
		return defined('HTTP_SERVER') ? HTTP_SERVER : '';
	}
	
	
	public function getShopDirectory()
	{
		return defined('DIR_WS_CATALOG') ? DIR_WS_CATALOG : '';
	}
	
	
	public function getShopUrl()
	{
		return $this->getHttpServer() . $this->getShopDirectory();
	}
	
	
	public function getShopKey()
	{
		return defined('GAMBIO_SHOP_KEY') ? GAMBIO_SHOP_KEY : '';
	}
	
	
	public function getDefaultLanguage()
	{
		return defined('DEFAULT_LANGUAGE') ? DEFAULT_LANGUAGE : 'en';
	}
	
	
	public function getActiveTemplate()
	{
		return defined('CURRENT_TEMPLATE') ? CURRENT_TEMPLATE : '';
	}
	
	
	public function getActiveTemplateVersion()
	{
		return gm_get_env_info('TEMPLATE_VERSION');
	}
	
	
	public function getGambioHubCurlTimeout()
	{
		return gm_get_conf('GAMBIO_HUB_CURL_TIMEOUT');
	}
	
	
	public function getGambioHubUrl()
	{
		return defined('MODULE_PAYMENT_GAMBIO_HUB_URL') ? MODULE_PAYMENT_GAMBIO_HUB_URL : '';
	}
	
	
	public function getGambioHubConfigUrl()
	{
		return 'https://config-api.gambiohub.com/a/api.php/api/v1';
	}
	
	
	public function getHubClientKey()
	{
		return gm_get_conf('GAMBIO_HUB_CLIENT_KEY');
	}
}