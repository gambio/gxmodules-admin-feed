<?php
/* --------------------------------------------------------------
   FileSystemDetailsRepository.php 2018-08-01
   Gambio GmbH
   http://www.gambio.de
   Copyright (c) 2018 Gambio GmbH
   Released under the GNU General Public License (Version 2)
   [http://www.gnu.org/licenses/gpl-2.0.html]
   --------------------------------------------------------------
*/

namespace Gambio\AdminFeed\Services\ShopInformation\Repositories;

use Gambio\AdminFeed\Services\ShopInformation\Mapper\FileSystemDetailsMapper;

/**
 * Interface FileSystemDetailsRepository
 *
 * @package Gambio\AdminFeed\Services\ShopInformation\Repositories\Interfaces
 */
class FileSystemDetailsRepository
{
	/**
	 * @var \Gambio\AdminFeed\Services\ShopInformation\Mapper\FileSystemDetailsMapper
	 */
	private $mapper;
	
	
	/**
	 * FileSystemDetailsRepository constructor.
	 *
	 * @param \Gambio\AdminFeed\Services\ShopInformation\Mapper\FileSystemDetailsMapper $mapper
	 */
	public function __construct(FileSystemDetailsMapper $mapper)
	{
		$this->mapper = $mapper;
	}
	
	
	/**
	 * @param \Gambio\AdminFeed\Services\ShopInformation\Mapper\FileSystemDetailsMapper $mapper
	 *
	 * @return self
	 */
	static function create(FileSystemDetailsMapper $mapper)
	{
		return new self($mapper);
	}
	
	
	/**
	 * @return \Gambio\AdminFeed\Services\ShopInformation\ValueObjects\FileSystemDetails
	 */
	public function getFileSystemDetails()
	{
		return $this->mapper->getFileSystemDetails();
	}
}