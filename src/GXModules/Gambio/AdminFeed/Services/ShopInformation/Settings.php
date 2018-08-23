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
	/**
	 * @return string
	 */
	public function getBaseDirectory()
	{
		return defined('DIR_FS_CATALOG') ? DIR_FS_CATALOG : '';
	}
	
	
	/**
	 * @return string
	 */
	public function getCurrentTemplate()
	{
		return defined('CURRENT_TEMPLATE') ? CURRENT_TEMPLATE : '';
	}
	
	
	/**
	 * @return string
	 */
	public function getHttpServer()
	{
		return defined('HTTP_SERVER') ? HTTP_SERVER : '';
	}
	
	
	/**
	 * @return string
	 */
	public function getShopDirectory()
	{
		return defined('DIR_WS_CATALOG') ? DIR_WS_CATALOG : '';
	}
	
	
	/**
	 * @return string
	 */
	public function getShopUrl()
	{
		return $this->getHttpServer() . $this->getShopDirectory();
	}
	
	
	/**
	 * @return string
	 */
	public function getShopKey()
	{
		return defined('GAMBIO_SHOP_KEY') ? GAMBIO_SHOP_KEY : '';
	}
	
	
	/**
	 * @return string
	 */
	public function getDefaultLanguage()
	{
		return defined('DEFAULT_LANGUAGE') ? DEFAULT_LANGUAGE : 'en';
	}
	
	
	/**
	 * @return string
	 */
	public function getActiveTemplate()
	{
		return defined('CURRENT_TEMPLATE') ? CURRENT_TEMPLATE : '';
	}
	
	
	/**
	 * @return string
	 */
	public function getActiveTemplateVersion()
	{
		return gm_get_env_info('TEMPLATE_VERSION');
	}
	
	
	/**
	 * @return array|bool|null
	 */
	public function getGambioHubCurlTimeout()
	{
		return gm_get_conf('GAMBIO_HUB_CURL_TIMEOUT');
	}
	
	
	/**
	 * @return string
	 */
	public function getGambioHubUrl()
	{
		return defined('MODULE_PAYMENT_GAMBIO_HUB_URL') ? MODULE_PAYMENT_GAMBIO_HUB_URL : '';
	}
	
	
	/**
	 * @return string
	 */
	public function getGambioHubConfigUrl()
	{
		return 'https://config-api.gambiohub.com/a/api.php/api/v1';
	}
	
	
	/**
	 * @return string
	 */
	public function getHubClientKey()
	{
		return gm_get_conf('GAMBIO_HUB_CLIENT_KEY');
	}
	
	
	/**
	 * @return string
	 */
	public function getTokenDataCacheKey()
	{
		return 'admin-feed-shop-information-tokens';
	}
	
	
	/**
	 * @return int
	 */
	public function getTokensLifespan()
	{
		return 60 * 5; # 5 minutes
	}
}