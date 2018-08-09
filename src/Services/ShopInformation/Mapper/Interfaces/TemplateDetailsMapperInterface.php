<?php
/* --------------------------------------------------------------
   TemplateDetailsMapperInterface.php 2018-08-01
   Gambio GmbH
   http://www.gambio.de
   Copyright (c) 2018 Gambio GmbH
   Released under the GNU General Public License (Version 2)
   [http://www.gnu.org/licenses/gpl-2.0.html]
   --------------------------------------------------------------
*/

namespace Gambio\AdminFeed\Services\ShopInformation\Mapper\Interfaces;

use Gambio\AdminFeed\Services\ShopInformation\Reader\Interfaces\TemplateDetailsReaderInterface;

/**
 * Interface TemplateDetailsMapperInterface
 *
 * @package Gambio\AdminFeed\Services\ShopInformation\Mapper\Interfaces
 */
interface TemplateDetailsMapperInterface
{
	/**
	 * @param \Gambio\AdminFeed\Services\ShopInformation\Reader\Interfaces\TemplateDetailsReaderInterface $reader
	 *
	 * @return \Gambio\AdminFeed\Services\ShopInformation\Mapper\Interfaces\UpdateDetailsMapperInterface
	 */
	public function create(TemplateDetailsReaderInterface $reader);
	
	
	/**
	 * @return \Gambio\AdminFeed\Services\ShopInformation\ValueObjects\Interfaces\TemplateDetailsInterface
	 */
	public function templateDetails();
}