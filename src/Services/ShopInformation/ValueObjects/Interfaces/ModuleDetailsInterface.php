<?php
/* --------------------------------------------------------------
   ModuleDetailsInterface.php 2018-08-01
   Gambio GmbH
   http://www.gambio.de
   Copyright (c) 2018 Gambio GmbH
   Released under the GNU General Public License (Version 2)
   [http://www.gnu.org/licenses/gpl-2.0.html]
   --------------------------------------------------------------
*/

namespace Gambio\AdminFeed\Services\ShopInformation\ValueObjects\Interfaces;

/**
 * Interface ModuleDetailsInterface
 *
 * @package Gambio\AdminFeed\Services\ShopInformation\ValueObjects\Interfaces
 */
interface ModuleDetailsInterface
{
	/**
	 * @param string $name
	 * @param bool   $installed
	 * @param bool   $enabled
	 *
	 * @return self
	 */
	static function create($name, $installed, $enabled);
	
	
	/**
	 * @return string
	 */
	public function name();
	
	
	/**
	 * @return bool
	 */
	public function installed();
	
	
	/**
	 * @return bool
	 */
	public function enabled();
}