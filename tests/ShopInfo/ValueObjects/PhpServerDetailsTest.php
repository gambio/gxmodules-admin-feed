<?php
/* --------------------------------------------------------------
   PhpServerDetailsTest.inc.php 2018-08-01
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
 * Class PhpServerDetailsTest
 */
class PhpServerDetailsTest extends TestCase
{
	/**
	 * @var string
	 */
	private $version = 'v1.0.1';
	
	/**
	 * @var array
	 */
	private $extensions = ['curl', 'xml', 'zip'];
	
	#
	# TESTS
	#
	
	public function testCreation()
	{
		$phpServerDetails  = PhpServerDetails::create($this->version, $this->extensions);
		$phpServerDetails2 = PhpServerDetails::create($this->version, $this->extensions);
		
		$this->assertNotSame($phpServerDetails, $phpServerDetails2,
		                     'Created php server details are identical/the same.');
	}
	
	
	public function testReturnValues()
	{
		$phpServerDetails = PhpServerDetails::create($this->version, $this->extensions);
		
		$this->assertVersion($phpServerDetails, $this->version);
		$this->assertExtensions($phpServerDetails, $this->extensions);
	}
	
	#
	# ASSERTIONS
	#
	
	private function assertVersion(PhpServerDetails $phpServerDetails, $version)
	{
		$this->assertEquals($phpServerDetails->version(), $version, 'Given and returned versions are not equals.');
	}
	
	
	private function assertExtensions(PhpServerDetails $phpServerDetails, $extensions)
	{
		$this->assertEquals($phpServerDetails->extensions(), $extensions,
		                    'Given and returned extensions are not equals.');
	}
}