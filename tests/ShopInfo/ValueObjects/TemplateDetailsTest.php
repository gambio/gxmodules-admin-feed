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
	 * @var array
	 */
	private $configuration = ['primary-color' => '#00ffff'];
	
	/**
	 * @var bool
	 */
	private $mobileCandyInstalled = false;
	
	#
	# TESTS
	#
	
	public function testCreation()
	{
		$templateDetails  = TemplateDetails::create($this->available, $this->selected, $this->configuration,
		                                            $this->mobileCandyInstalled);
		$templateDetails2 = TemplateDetails::create($this->available, $this->selected, $this->configuration,
		                                            $this->mobileCandyInstalled);
		
		$this->assertNotSame($templateDetails, $templateDetails2, 'Created template details are identical/the same.');
	}
	
	
	public function testReturnValues()
	{
		$templateDetails = TemplateDetails::create($this->available, $this->selected, $this->configuration,
		                                           $this->mobileCandyInstalled);
		
		$this->assertAvailableTemplates($templateDetails, $this->available);
		$this->assertSelectedTemplate($templateDetails, $this->selected);
		$this->assertTemplateConfiguration($templateDetails, $this->configuration);
		$this->assertMobileCandyInstalledFlag($templateDetails, $this->mobileCandyInstalled);
	}
	
	#
	# ASSERTIONS
	#
	
	private function assertAvailableTemplates(TemplateDetails $templateDetails, array $available)
	{
		$this->assertEquals($templateDetails->available(), $available,
		                    'Given and returned available templates are not equals.');
	}
	
	
	private function assertSelectedTemplate(TemplateDetails $templateDetails, $selected)
	{
		$this->assertEquals($templateDetails->selected(), $selected,
		                    'Given and returned selected templates are not equals.');
	}
	
	
	private function assertTemplateConfiguration(TemplateDetails $templateDetails, array $configuration)
	{
		$this->assertEquals($templateDetails->configuration(), $configuration,
		                    'Given and returned template configurations are not equals.');
	}
	
	
	private function assertMobileCandyInstalledFlag(TemplateDetails $templateDetails, $mobileCandyInstalled)
	{
		$this->assertEquals($templateDetails->mobileCandyInstalled(), $mobileCandyInstalled,
		                    'Given and returned mobile candy installed flags are not equals.');
	}
}