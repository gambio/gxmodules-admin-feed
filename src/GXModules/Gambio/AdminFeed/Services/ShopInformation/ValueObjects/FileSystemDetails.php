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
     * FileSystemDetails constructor.
     *
     * @param array  $usermods
     * @param array  $gxModules
     * @param array  $dangerousTools
     * @param array  $receiptFiles
     * @param string $globalUsermodDirectoryExists
     * @param string $upmDirectoryExists
     */
    public function __construct(private readonly array $usermods, private readonly array $gxModules, private readonly array $dangerousTools, private readonly array $receiptFiles, private $globalUsermodDirectoryExists, private $upmDirectoryExists)
    {
    }
    
    
    /**
     * Creates and returns a new FileSystemDetails instance.
     *
     * @param array  $usermods
     * @param array  $gxModules
     * @param array  $dangerousTools
     * @param array  $receiptFiles
     * @param string $globalUsermodDirectoryExists
     * @param string $upmDirectoryExists
     *
     * @return FileSystemDetails
     */
    static function create(
        array $usermods,
        array $gxModules,
        array $dangerousTools,
        array $receiptFiles,
        $globalUsermodDirectoryExists,
        $upmDirectoryExists
    ) {
        return new self($usermods,
                        $gxModules,
                        $dangerousTools,
                        $receiptFiles,
                        $globalUsermodDirectoryExists,
                        $upmDirectoryExists);
    }
    
    
    /**
     * Returns a list of user mods in the file system.
     *
     * @return array
     */
    public function usermods()
    {
        return $this->usermods;
    }
    
    
    /**
     * Returns a list of GXModules directories in the file system.
     *
     * @return array
     */
    public function gxModules()
    {
        return $this->gxModules;
    }
    
    
    /**
     * Returns a list of dangerous tools in the file system.
     *
     * @return array
     */
    public function dangerousTools()
    {
        return $this->dangerousTools;
    }
    
    
    /**
     * Returns a list of receipt files in the file system.
     *
     * @return array
     */
    public function receiptFiles()
    {
        return $this->receiptFiles;
    }
    
    
    /**
     * Returns the global user mod directory status.
     *
     * @return bool Returns true, if the global user mod directory exists, otherwise false will be returned.
     */
    public function globalUsermodDirectoryExists()
    {
        return $this->globalUsermodDirectoryExists;
    }
    
    
    /**
     * Returns the upm directory status.
     *
     * @return bool Returns true, of the upm directory exists, otherwise false will be returned.
     */
    public function upmDirectoryExists()
    {
        return $this->upmDirectoryExists;
    }
}