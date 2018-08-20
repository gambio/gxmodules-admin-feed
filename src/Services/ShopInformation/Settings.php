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
}