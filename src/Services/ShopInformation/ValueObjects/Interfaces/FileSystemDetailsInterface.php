<?php
/* --------------------------------------------------------------
   FileSystemDetailsInterface.php 2018-08-01
   Gambio GmbH
   http://www.gambio.de
   Copyright (c) 2018 Gambio GmbH
   Released under the GNU General Public License (Version 2)
   [http://www.gnu.org/licenses/gpl-2.0.html]
   --------------------------------------------------------------
*/

namespace Gambio\AdminFeed\Services\ShopInformation\ValueObjects\Interfaces;

/**
 * Interface FileSystemDetailsInterface
 *
 * @package Gambio\AdminFeed\Services\ShopInformation\ValueObjects\Interfaces
 */
interface FileSystemDetailsInterface
{
	/**
	 * @param array $usermods
	 * @param array $gxModules
	 * @param array $dangerousTools
	 * @param bool  $globalUsermodDirectoryExists
	 *
	 * @return self
	 */
	static function create(array $usermods,
	                       array $gxModules,
	                       array $dangerousTools,
	                       $globalUsermodDirectoryExists);
	
	
	/**
	 * @return array
	 */
	public function usermods();
	
	
	/**
	 * @return array
	 */
	public function gxModules();
	
	
	/**
	 * @return array
	 */
	public function dangerousTools();
	
	
	/**
	 * @return bool
	 */
	public function globalUsermodDirectoryExists();
}