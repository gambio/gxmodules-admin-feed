<?php
/* --------------------------------------------------------------
   ModulesDetailsRepository.php 2018-08-01
   Gambio GmbH
   http://www.gambio.de
   Copyright (c) 2018 Gambio GmbH
   Released under the GNU General Public License (Version 2)
   [http://www.gnu.org/licenses/gpl-2.0.html]
   --------------------------------------------------------------
*/

namespace Gambio\AdminFeed\Services\ShopInformation\Repositories;

use Gambio\AdminFeed\Services\ShopInformation\Mapper\ModulesDetailsMapper;

/**
 * Class ModulesDetailsRepository
 *
 * @package Gambio\AdminFeed\Services\ShopInformation\Repositories
 */
class ModulesDetailsRepository
{
	/**
	 * @param \Gambio\AdminFeed\Services\ShopInformation\Mapper\ModulesDetailsMapper $mapper
	 *
	 * @return self
	 */
	static function create(ModulesDetailsMapper $mapper)
	{
	}
	
	
	/**
	 * @return \Gambio\AdminFeed\Services\ShopInformation\ValueObjects\ModulesDetails
	 */
	public function modulesDetails()
	{
	}
}