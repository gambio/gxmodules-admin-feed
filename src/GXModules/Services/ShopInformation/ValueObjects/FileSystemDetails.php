<?php
/* --------------------------------------------------------------
   FileSystemDetails.php 2018-08-01
   Gambio GmbH
   http://www.gambio.de
   Copyright (c) 2018 Gambio GmbH
   Released under the GNU General Public License (Version 2)
   [http://www.gnu.org/licenses/gpl-2.0.html]
   --------------------------------------------------------------
*/

namespace Gambio\AdminFeed\Services\ShopInformation\ValueObjects;

use Gambio\AdminFeed\Services\ShopInformation\ValueObjects\Interfaces\FileSystemDetailsInterface;

/**
 * Class FileSystemDetails
 *
 * @package Gambio\AdminFeed\Services\ShopInformation\ValueObjects
 */
class FileSystemDetails implements FileSystemDetailsInterface
{
	/**
	 * @var array
	 */
	private $usermods;
	
	/**
	 * @var array
	 */
	private $gxModules;
	
	/**
	 * @var array
	 */
	private $dangerousTools;
	
	/**
	 * @var bool
	 */
	private $globalUsermodDirectoryExists;
	
	
	/**
	 * @param array $usermods
	 * @param array $gxModules
	 * @param array $dangerousTools
	 * @param bool  $globalUsermodDirectoryExists
	 */
	public function __construct(array $usermods,
	                            array $gxModules,
	                            array $dangerousTools,
	                            $globalUsermodDirectoryExists)
	{
		$this->usermods                     = $usermods;
		$this->gxModules                    = $gxModules;
		$this->dangerousTools               = $dangerousTools;
		$this->globalUsermodDirectoryExists = $globalUsermodDirectoryExists;
	}
	
	
	/**
	 * @param array $usermods
	 * @param array $gxModules
	 * @param array $dangerousTools
	 * @param bool  $globalUsermodDirectoryExists
	 *
	 * @return self
	 */
	static function create(array $usermods,
	                       array $gxModules,
	                       array $dangerousTools,
	                       $globalUsermodDirectoryExists)
	{
		return new self($usermods, $gxModules, $dangerousTools, $globalUsermodDirectoryExists);
	}
	
	
	/**
	 * @return array
	 */
	public function usermods()
	{
		return $this->usermods;
	}
	
	
	/**
	 * @return array
	 */
	public function gxModules()
	{
		return $this->gxModules;
	}
	
	
	/**
	 * @return array
	 */
	public function dangerousTools()
	{
		return $this->dangerousTools;
	}
	
	
	/**
	 * @return bool
	 */
	public function globalUsermodDirectoryExists()
	{
		return $this->globalUsermodDirectoryExists;
	}
}