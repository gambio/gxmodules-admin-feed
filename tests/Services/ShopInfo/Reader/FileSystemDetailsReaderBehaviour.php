<?php
/* --------------------------------------------------------------
   FileSystemDetailsReaderBehaviour.inc.php 2018-08-01
   Gambio GmbH
   http://www.gambio.de
   Copyright (c) 2018 Gambio GmbH
   Released under the GNU General Public License (Version 2)
   [http://www.gnu.org/licenses/gpl-2.0.html]
   --------------------------------------------------------------
*/

use Gambio\AdminFeed\Services\ShopInformation\Reader\FileSystemDetailsReader;
use Gambio\AdminFeed\Services\ShopInformation\Settings;
use PHPUnit\Framework\TestCase;

/**
 * Class FileSystemDetailsReaderBehaviour
 */
class FileSystemDetailsReaderBehaviour extends TestCase
{
	/**
	 * @var \Gambio\AdminFeed\Services\ShopInformation\Settings|\PHPUnit\Framework\MockObject\MockObject
	 */
	private $settings;
	
	/**
	 * @var \Gambio\AdminFeed\Services\ShopInformation\Reader\FileSystemDetailsReader
	 */
	private $reader;
	
	
	public function setUp()
	{
		$this->settings = $this->createMock(Settings::class);
		$this->settings->method('getBaseDirectory')->willReturn(__DIR__ . '/fixtures/file_system_details/shop_files/');
		$this->settings->method('getCurrentTemplate')->willReturn('Honeygrid');
		
		$this->reader = FileSystemDetailsReader::create($this->settings);
	}
	
	
	/**
	 * @test
	 */
	public function shouldReturnTheExpectedUserModsData()
	{
		$expectedData = [
			'admin/html/content/dashboard-USERMOD.html',
			'templates/Honeygrid/index-USERMOD.html',
			'templates/Honeygrid/boxes/box_add_a_quickie-USERMOD.html',
		];
		$actualData   = $this->reader->getUserMods();
		
		$this->assertEquals($expectedData, $actualData);
	}
	
	
	/**
	 * @test
	 */
	public function shouldReturnTheExpectedGxModulesData()
	{
		$expectedData = [
			'Ampify/Ampify',
			'Gambio/Hub',
			'Gambio/Ovisto',
			'Gambio/SingleSignOn',
			'Gambio/TwoFactorAuth',
			'Gambio/UpdateDownloader',
			'Mirko/Awesome',
		];
		$actualData   = $this->reader->getGxModules();
		
		$this->assertEquals($expectedData, $actualData);
	}
	
	
	/**
	 * @test
	 */
	public function shouldReturnTheExpectedDangerousToolsData()
	{
		$expectedData = ['__hackers.php', 'adminer.php',];
		$actualData   = $this->reader->getDangerousTools();
		
		$this->assertEquals($expectedData, $actualData);
	}
	
	
	/**
	 * @test
	 */
	public function shouldReturnTheExpectedGlobalUsermodDirectoryFlag()
	{
		$expectedData = true;
		$actualData   = $this->reader->doesGlobalUsermodDirectoryExist();
		
		$this->assertEquals($expectedData, $actualData);
	}
	
	
	/**
	 * @test
	 */
	public function shouldReturnTheExpectedReceiptFilesData()
	{
		$expectedData = [
			'3_10_0_1.php',
			'auto_updater-2_0_5.php',
			'gambio_hub-1_9_4.php',
			'google_services-1.0.5.php',
			'htaccessVersion.php',
			'ovisto-1_2_1.php',
		];
		$actualData   = $this->reader->getReceiptFiles();
		
		$this->assertEquals($expectedData, $actualData);
	}
	
	
	/**
	 * @test
	 */
	public function shouldReturnTheExpectedUpmDirectoryFlag()
	{
		$expectedData = true;
		$actualData   = $this->reader->doesUpmDirectoryExist();
		
		$this->assertEquals($expectedData, $actualData);
	}
}