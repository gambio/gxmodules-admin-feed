<?php
/* --------------------------------------------------------------
   TemplateDetailsTest.inc.php 2018-08-01
   Gambio GmbH
   http://www.gambio.de
   Copyright (c) 2018 Gambio GmbH
   Released under the GNU General Public License (Version 2)
   [http://www.gnu.org/licenses/gpl-2.0.html]
   --------------------------------------------------------------
*/

use Gambio\AdminFeed\Services\ShopInformation\ValueObjects\TemplateDetails;
use PHPUnit\Framework\TestCase;

/**
 * Class TemplateDetailsTest
 */
class TemplateDetailsTest extends TestCase
{
	/**
	 * @var array
	 */
	private $available = ['HoneyGrid', 'EyeCandy'];
	
	/**
	 * @var string
	 */
	private $selected = 'HoneyGrid';
	
	/**
	 * @var string
	 */
	private $version = '3';
	
	/**
	 * @var \Gambio\AdminFeed\Services\ShopInformation\ValueObjects\TemplateDetails
	 */
	private $templateDetails;
	
	
	public function setUp()
	{
		$this->templateDetails = TemplateDetails::create($this->available, $this->selected, $this->version);
	}
	
	
	/**
	 * @test
	 */
	public function shouldReturnGivenAvailableTemplates()
	{
		$this->assertEquals($this->templateDetails->available(), $this->available);
	}
	
	
	/**
	 * @test
	 */
	public function shouldReturnGivenSelectedTemplate()
	{
		$this->assertEquals($this->templateDetails->selected(), $this->selected);
	}
	
	
	/**
	 * @test
	 */
	public function shouldReturnGivenTemplateVersion()
	{
		$this->assertEquals($this->templateDetails->version(), $this->version);
	}
}