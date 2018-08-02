<?php
/* --------------------------------------------------------------
   ShopDetailsTest.inc.php 2018-08-01
   Gambio GmbH
   http://www.gambio.de
   Copyright (c) 2018 Gambio GmbH
   Released under the GNU General Public License (Version 2)
   [http://www.gnu.org/licenses/gpl-2.0.html]
   --------------------------------------------------------------
*/

use PHPUnit\Framework\TestCase;
use \Gambio\AdminFeed\Services\ShopInformation\ValueObjects\ShopDetails;

/**
 * Class ShopDetailsTest
 */
class ShopDetailsTest extends TestCase
{
	/**
	 * @var string
	 */
	private $version = 'v1.0.1';
	
	/**
	 * @var string
	 */
	private $url = 'http://www.example.org';
	
	/**
	 * @var string
	 */
	private $key = 'ABCDE-FGHI-JKLM-NOPQ';
	
	/**
	 * @var array
	 */
	private $languages = ['de', 'en'];
	
	/**
	 * @var array
	 */
	private $countries = ['de', 'at', 'ch'];
	
	/**
	 * @var \Gambio\AdminFeed\Services\ShopInformation\ValueObjects\ShopDetails
	 */
	private $shopDetails;
	
	#
	# SETUP
	#
	
	public function setUp()
	{
		$this->shopDetails = ShopDetails::create($this->version, $this->url, $this->key, $this->languages,
		                                         $this->countries);
	}
	
	#
	# TESTS
	#
	
	public function testVersionIsAccessible()
	{
		$this->assertEquals($this->shopDetails->version(), $this->version,
		                    'Given and returned versions are not equals.');
	}
	
	
	public function testUrlIsAccessible()
	{
		$this->assertEquals($this->shopDetails->url(), $this->url, 'Given and returned urls are not equals.');
	}
	
	
	public function testKeyIsAccessible()
	{
		$this->assertEquals($this->shopDetails->key(), $this->key, 'Given and returned keys are not equals.');
	}
	
	
	public function testLanguagesIsAccessible()
	{
		$this->assertEquals($this->shopDetails->languages(), $this->languages,
		                    'Given and returned languages are not equals.');
	}
	
	
	public function testCountriesIsAccessible()
	{
		$this->assertEquals($this->shopDetails->countries(), $this->countries,
		                    'Given and returned countries are not equals.');
	}
}