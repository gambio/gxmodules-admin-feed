<?php
/* --------------------------------------------------------------
   ServerDetailsRepository.php 2018-08-01
   Gambio GmbH
   http://www.gambio.de
   Copyright (c) 2018 Gambio GmbH
   Released under the GNU General Public License (Version 2)
   [http://www.gnu.org/licenses/gpl-2.0.html]
   --------------------------------------------------------------
*/

namespace Gambio\AdminFeed\Services\ShopInformation\Repositories;

use Gambio\AdminFeed\Services\ShopInformation\Mapper\ServerDetailsMapper;

/**
 * Class ServerDetailsRepository
 *
 * @package Gambio\AdminFeed\Services\ShopInformation\Repositories
 */
class ServerDetailsRepository
{
	/**
	 * @param \Gambio\AdminFeed\Services\ShopInformation\Mapper\ServerDetailsMapper $mapper
	 *
	 * @return self
	 */
	static function create(ServerDetailsMapper $mapper)
	{
	}
	
	
	/**
	 * @return \Gambio\AdminFeed\Services\ShopInformation\ValueObjects\ServerDetails
	 */
	public function serverDetails()
	{
	}
}