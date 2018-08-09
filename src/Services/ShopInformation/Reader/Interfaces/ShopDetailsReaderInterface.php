<?php
/* --------------------------------------------------------------
   ShopDetailsReaderInterface.php 2018-08-01
   Gambio GmbH
   http://www.gambio.de
   Copyright (c) 2018 Gambio GmbH
   Released under the GNU General Public License (Version 2)
   [http://www.gnu.org/licenses/gpl-2.0.html]
   --------------------------------------------------------------
*/

namespace Gambio\AdminFeed\Services\ShopInformation\Reader\Interfaces;

/**
 * Interface ShopDetailsReaderInterface
 *
 * @package Gambio\AdminFeed\Services\ShopInformation\Reader\Interfaces
 */
interface ShopDetailsReaderInterface
{
	/**
	 * @param \CI_DB_query_builder $db
	 *
	 * @return \Gambio\AdminFeed\Services\ShopInformation\Reader\Interfaces\ShopDetailsReaderInterface
	 */
	public function create(\CI_DB_query_builder $db);
	
	
	/**
	 * @return string
	 */
	public function getVersion();
	
	
	/**
	 * @return string
	 */
	public function getUrl();
	
	
	/**
	 * @return string
	 */
	public function getKey();
	
	
	/**
	 * @return array
	 */
	public function getLanguages();
	
	
	/**
	 * @return array
	 */
	public function getCountries();
}