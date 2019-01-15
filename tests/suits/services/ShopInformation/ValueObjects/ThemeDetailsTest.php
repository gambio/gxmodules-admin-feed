<?php
/* --------------------------------------------------------------
   ThemeDetailsTest.inc.php 2019-01-15
   Gambio GmbH
   http://www.gambio.de
   Copyright (c) 2019 Gambio GmbH
   Released under the GNU General Public License (Version 2)
   [http://www.gnu.org/licenses/gpl-2.0.html]
   --------------------------------------------------------------
*/

use Gambio\AdminFeed\Services\ShopInformation\ValueObjects\ThemeDetails;
use PHPUnit\Framework\TestCase;

/**
 * Class ThemeDetailsTest
 */
class ThemeDetailsTest extends TestCase
{
	/**
	 * @var array
	 */
	private $available = ['templates/HoneyGrid', 'templates/EyeCandy'];
	
	/**
	 * @var string
	 */
	private $selected = 'templates/HoneyGrid';
	
	/**
	 * @var string
	 */
	private $version = '3.0';
	
	/**
	 * @var \Gambio\AdminFeed\Services\ShopInformation\ValueObjects\ThemeDetails
	 */
	private $templateDetails;
	
	
	public function setUp()
	{
		$this->templateDetails = ThemeDetails::create($this->available, $this->selected, $this->version);
	}
	
	
	/**
	 * @test
	 */
	public function shouldReturnGivenAvailableTemplates()
	{
		$this->assertSame($this->templateDetails->available(), $this->available);
	}
	
	
	/**
	 * @test
	 */
	public function shouldReturnGivenSelectedTemplate()
	{
		$this->assertSame($this->templateDetails->selected(), $this->selected);
	}
	
	
	/**
	 * @test
	 */
	public function shouldReturnGivenTemplateVersion()
	{
		$this->assertSame($this->templateDetails->version(), $this->version);
	}
}