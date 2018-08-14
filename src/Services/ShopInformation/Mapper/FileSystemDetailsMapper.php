<?php
/* --------------------------------------------------------------
   FileSystemDetailsMapper.php 2018-08-01
   Gambio GmbH
   http://www.gambio.de
   Copyright (c) 2018 Gambio GmbH
   Released under the GNU General Public License (Version 2)
   [http://www.gnu.org/licenses/gpl-2.0.html]
   --------------------------------------------------------------
*/

namespace Gambio\AdminFeed\Services\ShopInformation\Mapper;

use Gambio\AdminFeed\Services\ShopInformation\Reader\FileSystemDetailsReader;

/**
 * Class FileSystemDetailsMapper
 *
 * @package Gambio\AdminFeed\Services\ShopInformation\Mapper
 */
class FileSystemDetailsMapper
{
	/**
	 * @param \Gambio\AdminFeed\Services\ShopInformation\Reader\FileSystemDetailsReader $reader
	 *
	 * @return self
	 */
	static function create(FileSystemDetailsReader $reader)
	{
	}
	
	
	/**
	 * @return \Gambio\AdminFeed\Services\ShopInformation\ValueObjects\FileSystemDetails
	 */
	public function fileSystemDetails()
	{
	}
}