<?php
/* --------------------------------------------------------------
   UpdateDetailsInterface.php 2018-08-01
   Gambio GmbH
   http://www.gambio.de
   Copyright (c) 2018 Gambio GmbH
   Released under the GNU General Public License (Version 2)
   [http://www.gnu.org/licenses/gpl-2.0.html]
   --------------------------------------------------------------
*/

namespace Gambio\AdminFeed\Services\ShopInformation\ValueObjects\Interfaces;

/**
 * Interface UpdateDetailsInterface
 *
 * @package Gambio\AdminFeed\Services\ShopInformation\ValueObjects\Interfaces
 */
interface UpdateDetailsInterface
{
	/**
	 * @param string $name
	 * @param string $version
	 *
	 * @return self
	 */
	static function create($name, $version);
	
	
	/**
	 * @return string
	 */
	public function name();
	
	
	/**
	 * @return string
	 */
	public function version();
}