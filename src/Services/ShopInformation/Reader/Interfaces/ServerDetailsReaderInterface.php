<?php
/* --------------------------------------------------------------
   ServerDetailsReaderInterface.php 2018-08-01
   Gambio GmbH
   http://www.gambio.de
   Copyright (c) 2018 Gambio GmbH
   Released under the GNU General Public License (Version 2)
   [http://www.gnu.org/licenses/gpl-2.0.html]
   --------------------------------------------------------------
*/

namespace Gambio\AdminFeed\Services\ShopInformation\Reader\Interfaces;

/**
 * Interface ServerDetailsReaderInterface
 *
 * @package Gambio\AdminFeed\Services\ShopInformation\Reader\Interfaces
 */
interface ServerDetailsReaderInterface
{
	/**
	 * @param \CI_DB_query_builder $db
	 *
	 * @return \Gambio\AdminFeed\Services\ShopInformation\Reader\Interfaces\ServerDetailsReaderInterface
	 */
	public function create(\CI_DB_query_builder $db);
	
	
	/**
	 * @return \Gambio\AdminFeed\Services\ShopInformation\ValueObjects\Interfaces\ServerDetailsInterface
	 */
	public function serverDetails();
}