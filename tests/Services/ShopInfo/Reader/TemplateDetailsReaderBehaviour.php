<?php
/* --------------------------------------------------------------
   TemplateDetailsReaderBehaviour.inc.php 2018-08-01
   Gambio GmbH
   http://www.gambio.de
   Copyright (c) 2018 Gambio GmbH
   Released under the GNU General Public License (Version 2)
   [http://www.gnu.org/licenses/gpl-2.0.html]
   --------------------------------------------------------------
*/

use Gambio\AdminFeed\Services\ShopInformation\Reader\TemplateDetailsReader;
use Gambio\AdminFeed\Services\ShopInformation\Settings;
use PHPUnit\Framework\TestCase;

/**
 * Class TemplateDetailsReaderBehaviour
 */
class TemplateDetailsReaderBehaviour extends TestCase
{
	/**
	 * @var \Gambio\AdminFeed\Services\ShopInformation\Settings
	 */
	private $settings;
	
	/**
	 * @var \Gambio\AdminFeed\Services\ShopInformation\Reader\TemplateDetailsReader
	 */
	private $reader;
	
	
	public function setUp()
	{
		$this->settings = $this->createMock(Settings::class);
		$this->settings->method('getBaseDirectory')->willReturn(__DIR__ . '/fixtures/template_details/shop_files/');
		$this->settings->method('getActiveTemplate')->willReturn('Honeygrid');
		$this->settings->method('getActiveTemplateVersion')->willReturn('3.0');
		
		$this->reader = TemplateDetailsReader::create($this->settings);
	}
	
	
	/**
	 * @test
	 */
	public function shouldReturnExpectedAvailableTemplatesData()
	{
		$expectedData = ['EyeCandy', 'Honeygrid', 'MyTemplate'];
		$actualData   = $this->reader->getAvailableTemplates();
		
		$this->assertEquals($expectedData, $actualData);
	}
	
	
	/**
	 * @test
	 */
	public function shouldReturnExpectedSelectedTemplateData()
	{
		$expectedData = 'Honeygrid';
		$actualData   = $this->reader->getSelectedTemplate();
		
		$this->assertEquals($expectedData, $actualData);
	}
	
	
	/**
	 * @test
	 */
	public function shouldReturnExpectedVersionData()
	{
		$expectedData = '3.0';
		$actualData   = $this->reader->getSelectedTemplateVersion();
		
		$this->assertEquals($expectedData, $actualData);
	}
}