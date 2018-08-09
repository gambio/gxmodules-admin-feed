<?php
/* --------------------------------------------------------------
   ModulesDetailsMapperInterface.php 2018-08-01
   Gambio GmbH
   http://www.gambio.de
   Copyright (c) 2018 Gambio GmbH
   Released under the GNU General Public License (Version 2)
   [http://www.gnu.org/licenses/gpl-2.0.html]
   --------------------------------------------------------------
*/

namespace Gambio\AdminFeed\Services\ShopInformation\Mapper\Interfaces;

use Gambio\AdminFeed\Services\ShopInformation\Reader\Interfaces\ModulesDetailsReaderInterface;

/**
 * Interface ModulesDetailsMapperInterface
 *
 * @package Gambio\AdminFeed\Services\ShopInformation\Mapper\Interfaces
 */
interface ModulesDetailsMapperInterface
{
	/**
	 * @param \Gambio\AdminFeed\Services\ShopInformation\Reader\Interfaces\ModulesDetailsReaderInterface $reader
	 *
	 * @return \Gambio\AdminFeed\Services\ShopInformation\Mapper\Interfaces\UpdateDetailsMapperInterface
	 */
	public function create(ModulesDetailsReaderInterface $reader);
	
	
	/**
	 * @return \Gambio\AdminFeed\Services\ShopInformation\ValueObjects\Interfaces\ModulesDetailsInterface
	 */
	public function modulesDetails();
}