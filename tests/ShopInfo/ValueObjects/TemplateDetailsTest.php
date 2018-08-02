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
	
	/**
	 * @var \Gambio\AdminFeed\Services\ShopInformation\ValueObjects\TemplateDetails
	 */
	private $templateDetails;
	
	#
	# SETUP
	#
	
	public function setUp()
	{
		$this->templateDetails = TemplateDetails::create($this->available, $this->selected, $this->configuration,
		                                                 $this->mobileCandyInstalled);
	}
	
	#
	# TESTS
	#
	
	public function testAvailableTemplatesAreAccessible()
	{
		$this->assertEquals($this->templateDetails->available(), $this->available,
		                    'Given and returned available templates are not equals.');
	}
	
	
	public function testSelectedTemplateIsAccessible()
	{
		$this->assertEquals($this->templateDetails->selected(), $this->selected,
		                    'Given and returned selected templates are not equals.');
	}
	
	
	public function testTemplateConfigurationIsAccessible()
	{
		$this->assertEquals($this->templateDetails->configuration(), $this->configuration,
		                    'Given and returned template configurations are not equals.');
	}
	
	
	public function testMobileCandyInstalledFlagIsAccessible()
	{
		$this->assertEquals($this->templateDetails->mobileCandyInstalled(), $this->mobileCandyInstalled,
		                    'Given and returned mobile candy installed flags are not equals.');
	}
}