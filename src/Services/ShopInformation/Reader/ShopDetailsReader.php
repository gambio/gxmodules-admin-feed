<?php
/* --------------------------------------------------------------
   ShopDetailsReader.php 2018-08-01
   Gambio GmbH
   http://www.gambio.de
   Copyright (c) 2018 Gambio GmbH
   Released under the GNU General Public License (Version 2)
   [http://www.gnu.org/licenses/gpl-2.0.html]
   --------------------------------------------------------------
*/

namespace Gambio\AdminFeed\Services\ShopInformation\Reader;

use Gambio\AdminFeed\Services\ShopInformation\Settings;

/**
 * Class ShopDetailsReader
 *
 * @package Gambio\AdminFeed\Services\ShopInformation\Reader
 */
class ShopDetailsReader
{
	/**
	 * @var \Gambio\AdminFeed\Services\ShopInformation\Settings
	 */
	private $settings;
	
	
	/**
	 * @var \CI_DB_query_builder
	 */
	private $db;
	
	
	/**
	 * ShopDetailsReader constructor.
	 *
	 * @param \Gambio\AdminFeed\Services\ShopInformation\Settings $settings
	 * @param \CI_DB_query_builder                                $db
	 */
	public function __construct(Settings $settings, \CI_DB_query_builder $db)
	{
		$this->settings = $settings;
		$this->db       = $db;
	}
	
	
	/**
	 * @return string
	 */
	public function getVersion()
	{
		include $this->settings->getBaseDirectory() . 'release_info.php';
		
		return isset($gx_version) ? $gx_version : '';
	}
	
	
	/**
	 * @return string
	 */
	public function getUrl()
	{
		return $this->settings->getHttpServer() . $this->settings->getShopDirectory();
	}
	
	
	/**
	 * @return string
	 */
	public function getKey()
	{
		return $this->settings->getShopKey();
	}
	
	
	/**
	 * @return array
	 */
	public function getLanguages()
	{
		$return = [];
		
		$languages = $this->db->select('code')
		                      ->from('languages')
		                      ->where('status', '1')
		                      ->order_by('code')
		                      ->get()
		                      ->result_array();
		foreach($languages as $language)
		{
			$return[] = $language['code'];
		}
		
		return $return;
	}
	
	
	/**
	 * @return string
	 */
	public function getDefaultLanguage()
	{
		return $this->settings->getDefaultLanguage();
	}
	
	
	/**
	 * @return array
	 */
	public function getCountries()
	{
		$return = [];
		
		$countries = $this->db->select('countries_iso_code_2')
		                      ->from('countries')
		                      ->where('status', '1')
		                      ->order_by('countries_iso_code_2')
		                      ->get()
		                      ->result_array();
		foreach($countries as $country)
		{
			$return[] = $country['countries_iso_code_2'];
		}
		
		return $return;
	}
	
	
	/**
	 * @return string
	 */
	public function getName()
	{
		$configuration = $this->db->select('configuration_value')
		                          ->from('configuration')
		                          ->where('configuration_key', 'STORE_NAME')
		                          ->get()
		                          ->row_array();
		
		return isset($configuration['configuration_value']) ? $configuration['configuration_value'] : '';
	}
	
	
	/**
	 * @return string
	 */
	public function getOwner()
	{
		$configuration = $this->db->select('configuration_value')
		                          ->from('configuration')
		                          ->where('configuration_key', 'STORE_OWNER')
		                          ->get()
		                          ->row_array();
		
		return isset($configuration['configuration_value']) ? $configuration['configuration_value'] : '';
	}
}