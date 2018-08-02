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
	
	/**
	 * @var \Gambio\AdminFeed\Services\ShopInformation\ValueObjects\FileSystemDetails
	 */
	private $fileSystemDetails;
	
	#
	# SETUP
	#
	
	public function setUp()
	{
		$this->fileSystemDetails = FileSystemDetails::create($this->usermods, $this->gxModules, $this->dangerousTools,
		                                                     $this->globalUsermodDirectoryExists);
	}
	
	#
	# TESTS
	#
	
	public function testUsermodsAreAccessible()
	{
		$this->assertEquals($this->fileSystemDetails->usermods(), $this->usermods,
		                    'Given and returned usermods are not equals.');
	}
	
	
	public function testGxModulesAreAccessible()
	{
		$this->assertEquals($this->fileSystemDetails->gxModules(), $this->gxModules,
		                    'Given and returned gx modules are not equals.');
	}
	
	
	public function testDangerousToolsAreAccessible()
	{
		$this->assertEquals($this->fileSystemDetails->dangerousTools(), $this->dangerousTools,
		                    'Given and returned dangerous tools are not equals.');
	}
	
	
	public function testGlobalUsermodDirectoryExistsFlagIsAccessible()
	{
		$this->assertEquals($this->fileSystemDetails->globalUsermodDirectoryExists(),
		                    $this->globalUsermodDirectoryExists,
		                    'Given and returned global usermod directory exists flags are not equals.');
	}
}