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
	private $gxModules = ['Gambio' => ['AdminFeed', 'Hub']];
	
	/**
	 * @var array
	 */
	private $dangerousTools = ['hacked.php'];
	
	/**
	 * @var bool
	 */
	private $globalUsermodDirectoryExists = false;
	
	#
	# TESTS
	#
	
	public function testCreation()
	{
		$fileSystemDetails  = FileSystemDetails::create($this->usermods, $this->gxModules, $this->dangerousTools,
		                                                $this->globalUsermodDirectoryExists);
		$fileSystemDetails2 = FileSystemDetails::create($this->usermods, $this->gxModules, $this->dangerousTools,
		                                                $this->globalUsermodDirectoryExists);
		
		$this->assertNotSame($fileSystemDetails, $fileSystemDetails2,
		                     'Created file system details are identical/the same.');
	}
	
	
	public function testReturnValues()
	{
		$fileSystemDetails = FileSystemDetails::create($this->usermods, $this->gxModules, $this->dangerousTools,
		                                               $this->globalUsermodDirectoryExists);
		
		$this->assertUsermods($fileSystemDetails, $this->usermods);
		$this->assertGxModules($fileSystemDetails, $this->gxModules);
		$this->assertDangerousTools($fileSystemDetails, $this->dangerousTools);
		$this->assertGlobalUsermodDirectoryExistsFlag($fileSystemDetails, $this->globalUsermodDirectoryExists);
	}
	
	#
	# ASSERTIONS
	#
	
	private function assertUsermods(FileSystemDetails $fileSystemDetails, $usermods)
	{
		$this->assertEquals($fileSystemDetails->usermods(), $usermods, 'Given and returned usermods are not equals.');
	}
	
	
	private function assertGxModules(FileSystemDetails $fileSystemDetails, $gxModules)
	{
		$this->assertEquals($fileSystemDetails->gxModules(), $gxModules,
		                    'Given and returned gx modules are not equals.');
	}
	
	
	private function assertDangerousTools(FileSystemDetails $fileSystemDetails, $dangerousTools)
	{
		$this->assertEquals($fileSystemDetails->dangerousTools(), $dangerousTools,
		                    'Given and returned dangerous tools are not equals.');
	}
	
	
	private function assertGlobalUsermodDirectoryExistsFlag(FileSystemDetails $fileSystemDetails,
	                                                        $globalUsermodDirectoryExists)
	{
		$this->assertEquals($fileSystemDetails->globalUsermodDirectoryExists(), $globalUsermodDirectoryExists,
		                    'Given and returned global usermod directory exists flags are not equals.');
	}
}