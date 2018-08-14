<?php
/* --------------------------------------------------------------
   GxAdapter.php 2018-08-02
   Gambio GmbH
   http://www.gambio.de
   Copyright (c) 2018 Gambio GmbH
   Released under the GNU General Public License (Version 2)
   [http://www.gnu.org/licenses/gpl-2.0.html]
   --------------------------------------------------------------
*/

namespace Gambio\AdminFeed\Adapters;

/**
 * Class GxAdapter
 *
 * @package Gambio\AdminFeed\Adapters
 */
class GxAdapter
{
	/**
	 * @return mixed
	 */
	public function mainFactoryCreate()
	{
		$args      = func_get_args();
		$className = $args[0];
		
		array_shift($args);
		
		$classObject = \MainFactory::create_object($className, $args);
		
		if($classObject === false)
		{
			throw new \InvalidArgumentException('Class not found in registry: ' . $className);
		}
		
		return $classObject;
	}
	
	
	/**
	 * @return mixed
	 */
	public function mainFactoryCreateObject($p_class_name, $p_args_array = [], $p_use_singleton = false)
	{
		return \MainFactory::create_object($p_class_name, $p_args_array, $p_use_singleton);
	}
	
	
	/**
	 * @return array
	 */
	public function getGxModulesFiles()
	{
		return \GXModulesCache::getFiles();
	}
	
	
	/**
	 * @return \CI_DB_query_builder
	 */
	public function getQueryBuilder()
	{
		return $db = \StaticGXCoreLoader::getDatabaseQueryBuilder();
	}
	
	
	/**
	 * @return mixed
	 */
	public function getSessionValue($key)
	{
		return $_SESSION[$key];
	}
}