<?php
/* --------------------------------------------------------------
   ServerDetailsReader.php 2018-08-01
   Gambio GmbH
   http://www.gambio.de
   Copyright (c) 2018 Gambio GmbH
   Released under the GNU General Public License (Version 2)
   [http://www.gnu.org/licenses/gpl-2.0.html]
   --------------------------------------------------------------
*/

namespace Gambio\AdminFeed\Services\ShopInformation\Reader;

/**
 * Class ServerDetailsReader
 *
 * @package Gambio\AdminFeed\Services\ShopInformation\Reader
 */
class ServerDetailsReader
{
	/**
	 * @var \CI_DB_query_builder
	 */
	private $db;
	
	
	/**
	 * ServerDetailsReader constructor.
	 *
	 * @param \CI_DB_query_builder $db
	 */
	public function __construct(\CI_DB_query_builder $db)
	{
		$this->db = $db;
	}
	
	
	/**
	 * @return string
	 */
	public function getPhpVersion()
	{
		return phpversion();
	}
	
	
	/**
	 * @return array
	 */
	public function getPhpExtensions()
	{
		return get_loaded_extensions();
	}
	
	
	/**
	 * @return array
	 */
	public function getPhpConfiguration()
	{
		return ini_get_all();
	}
	
	
	/**
	 * @return string
	 */
	public function getMysqlVersion()
	{
		return $this->db->version();
	}
	
	
	/**
	 * @return array
	 */
	public function getMysqlEngines()
	{
		$return = [];
		
		$engines = $this->db->query('SHOW ENGINES;')->result_array();
		foreach($engines as $engine)
		{
			$return[] = $engine['Engine'];
		}
		
		return $return;
	}
	
	
	/**
	 * @return string
	 */
	public function getMysqlDefaultEngine()
	{
		$return = '';
		
		$engines = $this->db->query('SHOW ENGINES;')->result_array();
		foreach($engines as $engine)
		{
			if($engine['Support'] === 'DEFAULT')
			{
				$return = $engine['Engine'];
				break;
			}
		}
		
		return $return;
	}
	
	
	/**
	 * @return string
	 */
	public function getWebserver()
	{
		return isset($_SERVER['SERVER_SOFTWARE']) ? $_SERVER['SERVER_SOFTWARE'] : '';
	}
	
	
	/**
	 * @return string
	 */
	public function getOperatingSystem()
	{
		return defined('PHP_OS') ? PHP_OS : '';
	}
}