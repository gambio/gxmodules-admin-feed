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
	 * @return \CI_DB_query_builder
	 */
	static function createQueryBuilder()
	{
		$db = \StaticGXCoreLoader::getDatabaseQueryBuilder();
		
		return $db;
	}
}