<?php
/* --------------------------------------------------------------
   PhpServerDetailsBehaviour.inc.php 2018-08-01
   Gambio GmbH
   http://www.gambio.de
   Copyright (c) 2018 Gambio GmbH
   Released under the GNU General Public License (Version 2)
   [http://www.gnu.org/licenses/gpl-2.0.html]
   --------------------------------------------------------------
*/

use Gambio\AdminFeed\Services\ShopInformation\ValueObjects\PhpServerDetails;
use PHPUnit\Framework\TestCase;

/**
 * Class PhpServerDetailsBehaviour
 */
class PhpServerDetailsBehaviour extends TestCase
{
	/**
	 * @var string
	 */
	private $version = 'v1.0.1';
	
	/**
	 * @var array
	 */
	private $extensions = ['curl', 'xml', 'zip'];
	
	/**
	 * @var array
	 */
	private $configuration = ['max_execution_time' => 30];
	
	/**
	 * @var \Gambio\AdminFeed\Services\ShopInformation\ValueObjects\PhpServerDetails
	 */
	private $phpServerDetails;
	
	
	public function setUp()
	{
		$this->phpServerDetails = PhpServerDetails::create($this->version, $this->extensions, $this->configuration);
	}
	
	
	/**
	 * @test
	 */
	public function shouldReturnGivenVersion()
	{
		$this->assertEquals($this->phpServerDetails->version(), $this->version);
	}
	
	
	/**
	 * @test
	 */
	public function shouldReturnGivenExtensions()
	{
		$this->assertEquals($this->phpServerDetails->extensions(), $this->extensions);
	}
	
	
	/**
	 * @test
	 */
	public function shouldReturnGivenConfiguration()
	{
		$this->assertEquals($this->phpServerDetails->configuration(), $this->configuration);
	}
}