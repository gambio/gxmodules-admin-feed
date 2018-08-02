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
	
	#
	# TESTS
	#
	
	public function testCreation()
	{
		$shopDetails  = ShopDetails::create($this->version, $this->url, $this->key, $this->languages, $this->countries);
		$shopDetails2 = ShopDetails::create($this->version, $this->url, $this->key, $this->languages, $this->countries);
		
		$this->assertNotSame($shopDetails, $shopDetails2, 'Created shop details are identical/the same.');
	}
	
	
	public function testReturnValues()
	{
		$shopDetails = ShopDetails::create($this->version, $this->url, $this->key, $this->languages, $this->countries);
		
		$this->assertVersion($shopDetails, $this->version);
		$this->assertUrl($shopDetails, $this->url);
		$this->assertKey($shopDetails, $this->key);
		$this->assertLanguages($shopDetails, $this->languages);
		$this->assertCountries($shopDetails, $this->countries);
	}
	
	#
	# ASSERTIONS
	#
	
	private function assertVersion(ShopDetails $shopDetails, $version)
	{
		$this->assertEquals($shopDetails->version(), $version, 'Given and returned versions are not equals.');
	}
	
	
	private function assertUrl(ShopDetails $shopDetails, $url)
	{
		$this->assertEquals($shopDetails->url(), $url, 'Given and returned urls are not equals.');
	}
	
	
	private function assertKey(ShopDetails $shopDetails, $key)
	{
		$this->assertEquals($shopDetails->key(), $key, 'Given and returned keys are not equals.');
	}
	
	
	private function assertLanguages(ShopDetails $shopDetails, array $languages)
	{
		$this->assertEquals($shopDetails->languages(), $languages, 'Given and returned languages are not equals.');
	}
	
	
	private function assertCountries(ShopDetails $shopDetails, array $countries)
	{
		$this->assertEquals($shopDetails->countries(), $countries, 'Given and returned countries are not equals.');
	}
}