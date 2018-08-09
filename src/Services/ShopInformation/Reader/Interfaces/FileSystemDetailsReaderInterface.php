<?php
/* --------------------------------------------------------------
   FileSystemDetailsReaderInterface.php 2018-08-01
   Gambio GmbH
   http://www.gambio.de
   Copyright (c) 2018 Gambio GmbH
   Released under the GNU General Public License (Version 2)
   [http://www.gnu.org/licenses/gpl-2.0.html]
   --------------------------------------------------------------
*/

namespace Gambio\AdminFeed\Services\ShopInformation\Reader\Interfaces;

/**
 * Interface FileSystemDetailsReaderInterface
 *
 * @package Gambio\AdminFeed\Services\ShopInformation\Reader\Interfaces
 */
interface FileSystemDetailsReaderInterface
{
	/**
	 * @param \CI_DB_query_builder $db
	 *
	 * @return \Gambio\AdminFeed\Services\ShopInformation\Reader\Interfaces\FileSystemDetailsReaderInterface
	 */
	public function create(\CI_DB_query_builder $db);
	
	
	/**
	 * @return array
	 */
	public function getUserMods();
	
	
	/**
	 * @return array
	 */
	public function getGxModules();
	
	
	/**
	 * @return array
	 */
	public function getDangerousTools();
	
	
	/**
	 * @return array
	 */
	public function doesGlobalUsermodDirectoryExist();
	
	
	/**
	 * @return array
	 */
	public function getReceiptFiles();
}