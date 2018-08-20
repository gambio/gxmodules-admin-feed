<?php
/* --------------------------------------------------------------
   DataCacheInterface.inc.php 2018-08-01
   Gambio GmbH
   http://www.gambio.de
   Copyright (c) 2018 Gambio GmbH
   Released under the GNU General Public License (Version 2)
   [http://www.gnu.org/licenses/gpl-2.0.html]
   --------------------------------------------------------------
*/

namespace Gambio\AdminFeed\Tests\GxMockInterfaces;

/**
 * Interface DataCacheInterface
 *
 * @package Gambio\AdminFeed\Tests\GxMockInterfaces
 */
interface DataCacheInterface
{
	/**
	 * @return mixed
	 */
	public function get_data($p_key, $p_persistent = false);
	
	/**
	 * @return bool
	 */
	public function key_exists($p_key, $p_persistent = false);
}