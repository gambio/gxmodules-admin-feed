<?php
/* --------------------------------------------------------------
   TemplateDetailsRepository.php 2018-08-01
   Gambio GmbH
   http://www.gambio.de
   Copyright (c) 2018 Gambio GmbH
   Released under the GNU General Public License (Version 2)
   [http://www.gnu.org/licenses/gpl-2.0.html]
   --------------------------------------------------------------
*/

namespace Gambio\AdminFeed\Services\ShopInformation\Repositories;

use Gambio\AdminFeed\Services\ShopInformation\Mapper\TemplateDetailsMapper;

/**
 * Class TemplateDetailsRepository
 *
 * @package Gambio\AdminFeed\Services\ShopInformation\Repositories
 */
class TemplateDetailsRepository
{
	/**
	 * @param \Gambio\AdminFeed\Services\ShopInformation\Mapper\TemplateDetailsMapper $mapper
	 *
	 * @return self
	 */
	static function create(TemplateDetailsMapper $mapper)
	{
	}
	
	
	/**
	 * @return \Gambio\AdminFeed\Services\ShopInformation\ValueObjects\TemplateDetails
	 */
	public function templateDetails()
	{
	}
}