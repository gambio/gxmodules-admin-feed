<?php
/* --------------------------------------------------------------
   UpdateDetailsMapperInterface.php 2018-08-01
   Gambio GmbH
   http://www.gambio.de
   Copyright (c) 2018 Gambio GmbH
   Released under the GNU General Public License (Version 2)
   [http://www.gnu.org/licenses/gpl-2.0.html]
   --------------------------------------------------------------
*/

namespace Gambio\AdminFeed\Services\ShopInformation\Mapper\Interfaces;

use Gambio\AdminFeed\Services\ShopInformation\Reader\Interfaces\UpdateDetailsReaderInterface;

/**
 * Interface UpdateDetailsMapperInterface
 *
 * @package Gambio\AdminFeed\Services\ShopInformation\Mapper\Interfaces
 */
interface UpdateDetailsMapperInterface
{
	/**
	 * @param \Gambio\AdminFeed\Services\ShopInformation\Reader\Interfaces\UpdateDetailsReaderInterface $reader
	 *
	 * @return \Gambio\AdminFeed\Services\ShopInformation\Mapper\Interfaces\UpdateDetailsMapperInterface
	 */
	public function create(UpdateDetailsReaderInterface $reader);
	
	
	/**
	 * @return \Gambio\AdminFeed\Services\ShopInformation\ValueObjects\Interfaces\TemplateDetailsInterface
	 */
	public function getUpdateDetails();
}