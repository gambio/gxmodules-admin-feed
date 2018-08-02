<?php
/* --------------------------------------------------------------
   ShopDetailsInterface.php 2018-08-01
   Gambio GmbH
   http://www.gambio.de
   Copyright (c) 2018 Gambio GmbH
   Released under the GNU General Public License (Version 2)
   [http://www.gnu.org/licenses/gpl-2.0.html]
   --------------------------------------------------------------
*/

namespace Gambio\AdminFeed\Services\ShopInformation\ValueObjects\Interfaces;

/**
 * Interface ShopDetailsInterface
 *
 * @package Gambio\AdminFeed\Services\ShopInformation\ValueObjects\Interfaces
 */
interface ShopDetailsInterface
{
	/**
	 * @param string         $version
	 * @param string         $url
	 * @param string         $key
	 * @param array $languages
	 * @param array $countries
	 *
	 * @return self
	 */
	static function create(string $version,
	                       string $url,
	                       string $key,
	                       array $languages,
	                       array $countries);
	
	
	/**
	 * @return string
	 */
	public function version();
	
	
	/**
	 * @return string
	 */
	public function url();
	
	
	/**
	 * @return string
	 */
	public function key();
	
	
	/**
	 * @return array
	 */
	public function languages();
	
	
	/**
	 * @return array
	 */
	public function countries();
	
}