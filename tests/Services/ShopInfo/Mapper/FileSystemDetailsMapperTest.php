<?php
/* --------------------------------------------------------------
   FileSystemDetailsMapperTest.inc.php 2018-08-01
   Gambio GmbH
   http://www.gambio.de
   Copyright (c) 2018 Gambio GmbH
   Released under the GNU General Public License (Version 2)
   [http://www.gnu.org/licenses/gpl-2.0.html]
   --------------------------------------------------------------
*/

use Gambio\AdminFeed\Services\ShopInformation\Mapper\FileSystemDetailsMapper;
use Gambio\AdminFeed\Services\ShopInformation\Reader\FileSystemDetailsReader;
use Gambio\AdminFeed\Services\ShopInformation\ValueObjects\FileSystemDetails;
use PHPUnit\Framework\TestCase;

/**
 * Class FileSystemDetailsMapperTest
 */
class FileSystemDetailsMapperTest extends TestCase
{
	/**
	 * @var array
	 */
	private $userMods = ['templates/Honeygrid/index-USERMOD.html'];
	
	/**
	 * @var array
	 */
	private $gxModules = ['Gambio/Hub', 'Gambio/UpdaterDownloader'];
	
	/**
	 * @var array
	 */
	private $dangerousTools = ['hacker.php', 'adminer.php'];
	
	/**
	 * @var array
	 */
	private $receiptFiles = ['auto_updater-2_0_5.php', 'gambio_hub-1_9_5.php'];
	
	/**
	 * @var bool
	 */
	private $globalUsermodDirectoryFlag = true;
	
	/**
	 * @var bool
	 */
	private $upmDirectoryFlag = true;
	
	
	/**
	 * @var \Gambio\AdminFeed\Services\ShopInformation\Reader\FileSystemDetailsReader
	 */
	private $reader;
	
	/**
	 * @var \Gambio\AdminFeed\Services\ShopInformation\Mapper\FileSystemDetailsMapper
	 */
	private $mapper;
	
	
	public function setUp()
	{
		$this->reader = $this->mockReader();
		
		$this->mapper = new FileSystemDetailsMapper($this->reader);
	}
	
	
	/**
	 * @test
	 */
	public function shouldReturnExpectedFileSystemDetails()
	{
		$expectedDetails = FileSystemDetails::create($this->userMods, $this->gxModules, $this->dangerousTools,
		                                             $this->receiptFiles, $this->globalUsermodDirectoryFlag,
		                                             $this->upmDirectoryFlag);
		
		$this->assertEquals($this->mapper->getFileSystemDetails(), $expectedDetails);
	}
	
	
	private function mockReader()
	{
		$reader = $this->createMock(FileSystemDetailsReader::class);
		$reader->method('getUserMods')->willReturn($this->userMods);
		$reader->method('getGxModules')->willReturn($this->gxModules);
		$reader->method('getDangerousTools')->willReturn($this->dangerousTools);
		$reader->method('getReceiptFiles')->willReturn($this->receiptFiles);
		$reader->method('doesGlobalUsermodDirectoryExist')->willReturn($this->globalUsermodDirectoryFlag);
		$reader->method('doesUpmDirectoryExist')->willReturn($this->upmDirectoryFlag);
		
		return $reader;
	}
}