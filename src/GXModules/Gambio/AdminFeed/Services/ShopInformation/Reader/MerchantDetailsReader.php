<?php
/* --------------------------------------------------------------
   MerchantDetailsReader.php 2018-08-01
   Gambio GmbH
   http://www.gambio.de
   Copyright (c) 2018 Gambio GmbH
   Released under the GNU General Public License (Version 2)
   [http://www.gnu.org/licenses/gpl-2.0.html]
   --------------------------------------------------------------
*/

namespace Gambio\AdminFeed\Services\ShopInformation\Reader;

use Gambio\AdminFeed\Adapters\GxAdapterTrait;

/**
 * Class MerchantDetailsReader
 *
 * @package Gambio\AdminFeed\Services\ShopInformation\Reader
 */
class MerchantDetailsReader
{
	use GxAdapterTrait;
	
	/**
	 * @var \CI_DB_query_builder
	 */
	private $db;
	
	
	/**
	 * MerchantDetailsReader constructor.
	 *
	 * @param \CI_DB_query_builder $db
	 */
	public function __construct(\CI_DB_query_builder $db)
	{
		$this->db = $db;
	}
	
	
	/**
	 * Returns the company of the merchant.
	 *
	 * @return string
	 */
	public function getCompany()
	{
		$configuration = $this->db->select('configuration_value')
		                          ->from('configuration')
		                          ->where('configuration_key', 'COMPANY_NAME')
		                          ->get()
		                          ->row_array();
		
		return isset($configuration['configuration_value']) ? $configuration['configuration_value'] : '';
	}
	
	
	/**
	 * Returns the first name of the merchant.
	 *
	 * @return string
	 */
	public function getFirstName()
	{
		$configuration = $this->db->select('configuration_value')
		                          ->from('configuration')
		                          ->where('configuration_key', 'TRADER_FIRSTNAME')
		                          ->get()
		                          ->row_array();
		
		return isset($configuration['configuration_value']) ? $configuration['configuration_value'] : '';
	}
	
	
	/**
	 * Returns the last name of the merchant.
	 * @return string
	 */
	public function getLastName()
	{
		$configuration = $this->db->select('configuration_value')
		                          ->from('configuration')
		                          ->where('configuration_key', 'TRADER_NAME')
		                          ->get()
		                          ->row_array();
		
		return isset($configuration['configuration_value']) ? $configuration['configuration_value'] : '';
	}
	
	
	/**
	 * Returns the street of the merchants address.
	 *
	 * @return string
	 */
	public function getStreet()
	{
		$configuration = $this->db->select('configuration_value')
		                          ->from('configuration')
		                          ->where('configuration_key', 'TRADER_STREET')
		                          ->get()
		                          ->row_array();
		
		return isset($configuration['configuration_value']) ? $configuration['configuration_value'] : '';
	}
	
	
	/**
	 * Returns the house number of the merchants address.
	 *
	 * @return string
	 */
	public function getHouseNumber()
	{
		$configuration = $this->db->select('configuration_value')
		                          ->from('configuration')
		                          ->where('configuration_key', 'TRADER_STREET_NUMBER')
		                          ->get()
		                          ->row_array();
		
		return isset($configuration['configuration_value']) ? $configuration['configuration_value'] : '';
	}
	
	
	/**
	 * returns the postal code of the merchants address.
	 *
	 * @return string
	 */
	public function getPostalCode()
	{
		$configuration = $this->db->select('configuration_value')
		                          ->from('configuration')
		                          ->where('configuration_key', 'TRADER_ZIPCODE')
		                          ->get()
		                          ->row_array();
		
		return isset($configuration['configuration_value']) ? $configuration['configuration_value'] : '';
	}
	
	
	/**
	 * Returns the city of the merchants address.
	 *
	 * @return string
	 */
	public function getCity()
	{
		$configuration = $this->db->select('configuration_value')
		                          ->from('configuration')
		                          ->where('configuration_key', 'TRADER_LOCATION')
		                          ->get()
		                          ->row_array();
		
		return isset($configuration['configuration_value']) ? $configuration['configuration_value'] : '';
	}
	
	
	/**
	 * Returns the state of the merchants address.
	 *
	 * @return string
	 */
	public function getState()
	{
		$configuration = $this->db->select('configuration_value')
		                          ->from('configuration')
		                          ->where('configuration_key', 'STORE_ZONE')
		                          ->get()
		                          ->row_array();
		
		if(!(isset($configuration['configuration_value']) && (int)$configuration['configuration_value'] > 0))
		{
			return '';
		}
		
		$zone = $this->db->select('zone_name')
		                 ->from('zones')
		                 ->where('zone_id', (int)$configuration['configuration_value'])
		                 ->get()
		                 ->row_array();
		
		return isset($zone['zone_name']) ? $zone['zone_name'] : '';
	}
	
	
	/**
	 * Returns the country of the merchants address.
	 *
	 * @return string
	 */
	public function getCountry()
	{
		$configuration = $this->db->select('configuration_value')
		                          ->from('configuration')
		                          ->where('configuration_key', 'STORE_COUNTRY')
		                          ->get()
		                          ->row_array();
		
		if(!(isset($configuration['configuration_value']) && (int)$configuration['configuration_value'] > 0))
		{
			return '';
		}
		
		$country = $this->db->select('countries_name, countries_iso_code_2')
		                    ->from('countries')
		                    ->where('countries_id', (int)$configuration['configuration_value'])
		                    ->get()
		                    ->row_array();
		
		$gxAdapter       = $this->gxAdapter();
		$langTextManager = $gxAdapter->mainFactoryCreateObject('LanguageTextManager', [
			'countries',
			$gxAdapter->getSessionValue('languages_id')
		]);
		
		$return = $langTextManager->get_text($country['countries_iso_code_2']);
		if($return === $country['countries_iso_code_2'] || empty($return))
		{
			$return = isset($country['countries_name']) ? $country['countries_name'] : '';
		}
		
		return $return;
	}
	
	
	/**
	 * Returns the phone number of the merchant.
	 *
	 * @return string
	 */
	public function getPhone()
	{
		$configuration = $this->db->select('configuration_value')
		                          ->from('configuration')
		                          ->where('configuration_key', 'TRADER_TEL')
		                          ->get()
		                          ->row_array();
		
		return isset($configuration['configuration_value']) ? $configuration['configuration_value'] : '';
	}
	
	
	/**
	 * Returns the fax number of the merchant.
	 *
	 * @return string
	 */
	public function getFax()
	{
		$configuration = $this->db->select('configuration_value')
		                          ->from('configuration')
		                          ->where('configuration_key', 'TRADER_FAX')
		                          ->get()
		                          ->row_array();
		
		return isset($configuration['configuration_value']) ? $configuration['configuration_value'] : '';
	}
	
	
	/**
	 * Returns the email address of the merchant.
	 *
	 * @return string
	 */
	public function getEmail()
	{
		$configuration = $this->db->select('configuration_value')
		                          ->from('configuration')
		                          ->where('configuration_key', 'STORE_OWNER_EMAIL_ADDRESS')
		                          ->get()
		                          ->row_array();
		
		return isset($configuration['configuration_value']) ? $configuration['configuration_value'] : '';
	}
}