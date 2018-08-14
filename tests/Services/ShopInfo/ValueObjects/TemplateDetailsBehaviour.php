<?php
/* --------------------------------------------------------------
   TemplateDetailsBehaviour.inc.php 2018-08-01
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
 * Class TemplateDetailsBehaviour
 */
class TemplateDetailsBehaviour extends TestCase
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
	 * @var array
	 */
	private $configuration = ['primary-color' => '#00ffff'];
	
	/**
	 * @var bool
	 */
	private $mobileCandyInstalled = false;
	
	/**
	 * @var \Gambio\AdminFeed\Services\ShopInformation\ValueObjects\TemplateDetails
	 */
	private $templateDetails;
	
	
	public function setUp()
	{
		$this->templateDetails = TemplateDetails::create($this->available, $this->selected, $this->configuration,
		                                                 $this->mobileCandyInstalled);
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
	public function shouldReturnGivenTemplateConfiguration()
	{
		$this->assertEquals($this->templateDetails->configuration(), $this->configuration);
	}
	
	
	/**
	 * @test
	 */
	public function shouldReturnGivenMobileCandyInstalledFlag()
	{
		$this->assertEquals($this->templateDetails->mobileCandyInstalled(), $this->mobileCandyInstalled);
	}
}