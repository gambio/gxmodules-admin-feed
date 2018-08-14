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

/**
 * Class FileSystemDetails
 *
 * @package Gambio\AdminFeed\Services\ShopInformation\ValueObjects
 */
class FileSystemDetails
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
	 * @var array
	 */
	private $receiptFiles;
	
	/**
	 * @var bool
	 */
	private $globalUsermodDirectoryExists;
	
	/**
	 * @var bool
	 */
	private $upmDirectoryExists;
	
	
	/**
	 * @param array $usermods
	 * @param array $gxModules
	 * @param array $dangerousTools
	 * @param array $receiptFiles
	 * @param bool  $globalUsermodDirectoryExists
	 * @param bool  $upmDirectoryExists
	 */
	public function __construct(array $usermods,
	                            array $gxModules,
	                            array $dangerousTools,
	                            array $receiptFiles,
	                            $globalUsermodDirectoryExists,
	                            $upmDirectoryExists)
	{
		$this->usermods                     = $usermods;
		$this->gxModules                    = $gxModules;
		$this->dangerousTools               = $dangerousTools;
		$this->receiptFiles                 = $receiptFiles;
		$this->globalUsermodDirectoryExists = $globalUsermodDirectoryExists;
		$this->upmDirectoryExists           = $upmDirectoryExists;
	}
	
	
	/**
	 * @param array $usermods
	 * @param array $gxModules
	 * @param array $dangerousTools
	 * @param array $receiptFiles
	 * @param bool  $globalUsermodDirectoryExists
	 * @param bool  $upmDirectoryExists
	 *
	 * @return self
	 */
	static function create(array $usermods,
	                       array $gxModules,
	                       array $dangerousTools,
	                       array $receiptFiles,
	                       $globalUsermodDirectoryExists,
	                       $upmDirectoryExists)
	{
		return new self($usermods, $gxModules, $dangerousTools, $receiptFiles, $globalUsermodDirectoryExists,
		                $upmDirectoryExists);
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
	 * @return array
	 */
	public function receiptFiles()
	{
		return $this->receiptFiles;
	}
	
	
	/**
	 * @return bool
	 */
	public function globalUsermodDirectoryExists()
	{
		return $this->globalUsermodDirectoryExists;
	}
	
	
	/**
	 * @return bool
	 */
	public function upmDirectoryExists()
	{
		return $this->upmDirectoryExists;
	}
}