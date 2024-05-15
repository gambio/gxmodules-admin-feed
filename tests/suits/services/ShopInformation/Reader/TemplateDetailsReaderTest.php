<?php
/* --------------------------------------------------------------
   TemplateDetailsReaderTest.inc.php 2019-01-15
   Gambio GmbH
   http://www.gambio.de
   Copyright (c) 2019 Gambio GmbH
   Released under the GNU General Public License (Version 2)
   [http://www.gnu.org/licenses/gpl-2.0.html]
   --------------------------------------------------------------
*/

use Gambio\AdminFeed\Adapters\GxAdapter;
use Gambio\AdminFeed\Services\ShopInformation\Reader\TemplateDetailsReader;
use Gambio\AdminFeed\Services\ShopInformation\Settings;
use Gambio\AdminFeed\Tests\GxMockInterfaces\ThemeControlInterface;
use PHPUnit\Framework\TestCase;

/**
 * Class TemplateDetailsReaderTest
 */
class TemplateDetailsReaderTest extends TestCase
{
	/**
	 * @var \Gambio\AdminFeed\Services\ShopInformation\Settings
	 */
	private $settings;
	
	/**
	 * @var \Gambio\AdminFeed\Services\ShopInformation\Reader\TemplateDetailsReader
	 */
	private $reader;
	
	
	#[\Override]
 public function setUp()
	{
		$this->settings = $this->createMock(Settings::class);
		$this->settings->method('getBaseDirectory')->willReturn(__DIR__ . '/fixtures/template_details/shop_files/');
		$this->settings->method('getActiveTemplate')->willReturn('Honeygrid');
		$this->settings->method('getActiveTemplateVersion')->willReturn('3.0');
		
		$this->reader = new TemplateDetailsReader($this->settings);
	}
	
	
	/**
	 * @test
	 */
	public function shouldReturnExpectedAvailableTemplatesData(): void
	{
		$expectedData = [
			'templates/EyeCandy',
			'templates/Honeygrid',
			'templates/MyTemplate',
			'themes/Childgrid',
			'themes/Grandgrid',
			'themes/Honeygrid'
		];
		$actualData   = $this->reader->getAvailableTemplates();
		
		$this->assertSame($expectedData, $actualData);
	}
	
	
	/**
	 * @test
	 */
	public function shouldReturnExpectedSelectedTemplateDataIfThemesAreAvailable(): void
	{
		$this->settings->method('areThemesAvailable')->willReturn(true);
		$this->reader->setGxAdapter($this->mockGxAdapter());
		
		$expectedData = 'themes/Honeygrid';
		$actualData   = $this->reader->getActiveTemplate();
		
		$this->assertSame($expectedData, $actualData);
	}
	
	
	/**
	 * @test
	 */
	public function shouldReturnExpectedSelectedTemplateDataIfThemesAreNotAvailable(): void
	{
		$this->settings->method('areThemesAvailable')->willReturn(false);
		
		$expectedData = 'templates/Honeygrid';
		$actualData   = $this->reader->getActiveTemplate();
		
		$this->assertSame($expectedData, $actualData);
	}
	
	
	/**
	 * @test
	 */
	public function shouldReturnExpectedVersionDataIfThemesAreAvailable(): void
	{
		$this->settings->method('areThemesAvailable')->willReturn(true);
		$this->reader->setGxAdapter($this->mockGxAdapter());
		
		$expectedData = '4.0';
		$actualData   = $this->reader->getActiveTemplateVersion();
		
		$this->assertSame($expectedData, $actualData);
	}
	
	
	/**
	 * @test
	 */
	public function shouldReturnExpectedVersionDataIfThemesAreNotAvailable(): void
	{
		$this->settings->method('areThemesAvailable')->willReturn(false);
		
		$expectedData = '3.0';
		$actualData   = $this->reader->getActiveTemplateVersion();
		
		$this->assertSame($expectedData, $actualData);
	}
	
	
	
	private function mockGxAdapter()
	{
		$themeControl = $this->createMock(ThemeControlInterface::class);
		$themeControl->method('isThemeSystemActive')->willReturn(true);
		$themeControl->method('getCurrentTheme')->willReturn('Honeygrid');
		$themeControl->method('getThemeVersion')->willReturn('4.0');
		
		$adapter = $this->createMock(GxAdapter::class);
		$adapter->method('getThemeControl')->willReturn($themeControl);
		
		return $adapter;
	}
}