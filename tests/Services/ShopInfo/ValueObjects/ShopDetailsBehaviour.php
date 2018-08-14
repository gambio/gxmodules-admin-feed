<?php
/* --------------------------------------------------------------
   ShopDetailsBehaviour.inc.php 2018-08-01
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
 * Class ShopDetailsBehaviour
 */
class ShopDetailsBehaviour extends TestCase
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
	
	
	public function setUp()
	{
		$this->shopDetails = ShopDetails::create($this->version, $this->url, $this->key, $this->languages,
		                                         $this->countries);
	}
	
	
	/**
	 * @test
	 */
	public function shouldReturnGivenVersion()
	{
		$this->assertEquals($this->shopDetails->version(), $this->version);
	}
	
	
	/**
	 * @test
	 */
	public function shouldReturnGivenUrl()
	{
		$this->assertEquals($this->shopDetails->url(), $this->url);
	}
	
	
	/**
	 * @test
	 */
	public function shouldReturnGivenKey()
	{
		$this->assertEquals($this->shopDetails->key(), $this->key);
	}
	
	
	/**
	 * @test
	 */
	public function shouldReturnGivenLanguages()
	{
		$this->assertEquals($this->shopDetails->languages(), $this->languages);
	}
	
	
	/**
	 * @test
	 */
	public function shouldReturnGivenCountries()
	{
		$this->assertEquals($this->shopDetails->countries(), $this->countries);
	}
}