<?php
/* --------------------------------------------------------------
   FileSystemDetailsTest.inc.php 2018-08-01
   Gambio GmbH
   http://www.gambio.de
   Copyright (c) 2018 Gambio GmbH
   Released under the GNU General Public License (Version 2)
   [http://www.gnu.org/licenses/gpl-2.0.html]
   --------------------------------------------------------------
*/

use Gambio\AdminFeed\Services\ShopInformation\ValueObjects\FileSystemDetails;
use PHPUnit\Framework\TestCase;

/**
 * Class FileSystemDetailsTest
 */
class FileSystemDetailsTest extends TestCase
{
	/**
	 * @var array
	 */
	private $usermods = [];
	
	/**
	 * @var array
	 */
	private $gxModules = ['Gambio/AdminFeed', 'Gambio/Hub'];
	
	/**
	 * @var array
	 */
	private $dangerousTools = ['hacked.php'];
	
	/**
	 * @var array
	 */
	private $receiptFiles = ['auto_updater-2_0_5.php'];
	
	/**
	 * @var bool
	 */
	private $globalUsermodDirectoryExists = false;
	
	/**
	 * @var bool
	 */
	private $upmDirectoryExists = true;
	
	/**
	 * @var \Gambio\AdminFeed\Services\ShopInformation\ValueObjects\FileSystemDetails
	 */
	private $fileSystemDetails;
	
	
	public function setUp()
	{
		$this->fileSystemDetails = FileSystemDetails::create($this->usermods, $this->gxModules, $this->dangerousTools,
		                                                     $this->receiptFiles, $this->globalUsermodDirectoryExists,
		                                                     $this->upmDirectoryExists);
	}
	
	
	/**
	 * @test
	 */
	public function shouldReturnGivenUsermods()
	{
		$this->assertSame($this->fileSystemDetails->usermods(), $this->usermods);
	}
	
	
	/**
	 * @test
	 */
	public function shouldReturnGivenGxModules()
	{
		$this->assertSame($this->fileSystemDetails->gxModules(), $this->gxModules);
	}
	
	
	/**
	 * @test
	 */
	public function shouldReturnGivenDangerousTools()
	{
		$this->assertSame($this->fileSystemDetails->dangerousTools(), $this->dangerousTools);
	}
	
	
	/**
	 * @test
	 */
	public function shouldReturnGivenGlobalUsermodDirectoryExistsFlag()
	{
		$this->assertSame($this->fileSystemDetails->globalUsermodDirectoryExists(),
		                  $this->globalUsermodDirectoryExists);
	}
	
	
	/**
	 * @test
	 */
	public function shouldReturnGivenUpmDirectoryExistsFlag()
	{
		$this->assertSame($this->fileSystemDetails->upmDirectoryExists(), $this->upmDirectoryExists);
	}
}