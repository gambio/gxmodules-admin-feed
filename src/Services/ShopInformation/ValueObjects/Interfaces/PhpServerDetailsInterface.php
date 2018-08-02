<?php
/* --------------------------------------------------------------
   PhpServerDetailsInterface.php 2018-08-01
   Gambio GmbH
   http://www.gambio.de
   Copyright (c) 2018 Gambio GmbH
   Released under the GNU General Public License (Version 2)
   [http://www.gnu.org/licenses/gpl-2.0.html]
   --------------------------------------------------------------
*/

namespace Gambio\AdminFeed\Services\ShopInformation\ValueObjects\Interfaces;

/**
 * Interface PhpServerDetailsInterface
 *
 * @package Gambio\AdminFeed\Services\ShopInformation\ValueObjects\Interfaces
 */
interface PhpServerDetailsInterface
{
	/**
	 * @param string $version
	 * @param array  $extensions
	 *
	 * @return self
	 */
	static function create($version, array $extensions);
	
	
	/**
	 * @return string
	 */
	public function version();
	
	
	/**
	 * @return array
	 */
	public function extensions();
}