<?php
/* --------------------------------------------------------------
   TemplateDetailsRepositoryInterface.php 2018-08-01
   Gambio GmbH
   http://www.gambio.de
   Copyright (c) 2018 Gambio GmbH
   Released under the GNU General Public License (Version 2)
   [http://www.gnu.org/licenses/gpl-2.0.html]
   --------------------------------------------------------------
*/

namespace Gambio\AdminFeed\Services\ShopInformation\Repositories\Interfaces;

use Gambio\AdminFeed\Services\ShopInformation\Mapper\Interfaces\TemplateDetailsMapperInterface;

/**
 * Interface TemplateDetailsRepositoryInterface
 *
 * @package Gambio\AdminFeed\Services\ShopInformation\Repositories\Interfaces
 */
interface TemplateDetailsRepositoryInterface
{
	/**
	 * @param \Gambio\AdminFeed\Services\ShopInformation\Mapper\Interfaces\TemplateDetailsMapperInterface $mapper
	 *
	 * @return \Gambio\AdminFeed\Services\ShopInformation\ValueObjects\Interfaces\TemplateDetailsInterface
	 */
	public function create(TemplateDetailsMapperInterface $mapper);
	
	
	/**
	 * @return \Gambio\AdminFeed\Services\ShopInformation\ValueObjects\Interfaces\TemplateDetailsInterface
	 */
	public function templateDetails();
}