<?php
/* --------------------------------------------------------------
   FileSystemDetailsMapperInterface.php 2018-08-01
   Gambio GmbH
   http://www.gambio.de
   Copyright (c) 2018 Gambio GmbH
   Released under the GNU General Public License (Version 2)
   [http://www.gnu.org/licenses/gpl-2.0.html]
   --------------------------------------------------------------
*/

namespace Gambio\AdminFeed\Services\ShopInformation\Mapper\Interfaces;

use Gambio\AdminFeed\Services\ShopInformation\Reader\Interfaces\FileSystemDetailsReaderInterface;

/**
 * Interface FileSystemDetailsMapperInterface
 *
 * @package Gambio\AdminFeed\Services\ShopInformation\Mapper\Interfaces
 */
interface FileSystemDetailsMapperInterface
{
	/**
	 * @param \Gambio\AdminFeed\Services\ShopInformation\Reader\Interfaces\FileSystemDetailsReaderInterface $reader
	 *
	 * @return \Gambio\AdminFeed\Services\ShopInformation\Mapper\Interfaces\UpdateDetailsMapperInterface
	 */
	public function create(FileSystemDetailsReaderInterface $reader);
	
	
	/**
	 * @return \Gambio\AdminFeed\Services\ShopInformation\ValueObjects\Interfaces\FileSystemDetailsInterface
	 */
	public function fileSystemDetails();
}