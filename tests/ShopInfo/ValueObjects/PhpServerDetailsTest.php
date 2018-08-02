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
	
	/**
	 * @var \Gambio\AdminFeed\Services\ShopInformation\ValueObjects\PhpServerDetails
	 */
	private $phpServerDetails;
	
	#
	# SETUP
	#
	
	public function setUp()
	{
		$this->phpServerDetails = PhpServerDetails::create($this->version, $this->extensions);
	}
	
	#
	# TESTS
	#
	
	public function testVersionIsAccessible()
	{
		$this->assertEquals($this->phpServerDetails->version(), $this->version,
		                    'Given and returned versions are not equals.');
	}
	
	
	public function testExtensionsAreAccessible()
	{
		$this->assertEquals($this->phpServerDetails->extensions(), $this->extensions,
		                    'Given and returned extensions are not equals.');
	}
}