<?php
/* --------------------------------------------------------------
   ShopDetailsMapperInterface.php 2018-08-01
   Gambio GmbH
   http://www.gambio.de
   Copyright (c) 2018 Gambio GmbH
   Released under the GNU General Public License (Version 2)
   [http://www.gnu.org/licenses/gpl-2.0.html]
   --------------------------------------------------------------
*/

namespace Gambio\AdminFeed\Services\ShopInformation\Mapper\Interfaces;

use Gambio\AdminFeed\Services\ShopInformation\Reader\Interfaces\ShopDetailsReaderInterface;

/**
 * Interface ShopDetailsMapperInterface
 *
 * @package Gambio\AdminFeed\Services\ShopInformation\Mapper\Interfaces
 */
interface ShopDetailsMapperInterface
{
	/**
	 * @param \Gambio\AdminFeed\Services\ShopInformation\Reader\Interfaces\ShopDetailsReaderInterface $reader
	 *
	 * @return \Gambio\AdminFeed\Services\ShopInformation\Mapper\Interfaces\UpdateDetailsMapperInterface
	 */
	public function create(ShopDetailsReaderInterface $reader);
	
	
	/**
	 * @return \Gambio\AdminFeed\Services\ShopInformation\ValueObjects\Interfaces\ShopDetailsInterface
	 */
	public function shopDetails();
}