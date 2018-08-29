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
	private $url = 'https://www.example.org';
	
	/**
	 * @var string
	 */
	private $key = 'ABCDE-FGHI-JKLM-NOPQ';
	
	/**
	 * @var array
	 */
	private $languages = ['de', 'en'];
	
	/**
	 * @var string
	 */
	private $defaultLanguage = 'de';
	
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
		                                         $this->defaultLanguage, $this->countries);
	}
	
	
	/**
	 * @test
	 */
	public function shouldThrowInvalidArgumentExceptionIfGivenVersionIsEmpty()
	{
		$this->expectException(\InvalidArgumentException::class);
		
		ShopDetails::create('', $this->url, $this->key, $this->languages, $this->defaultLanguage, $this->countries);
	}
	
	
	/**
	 * @test
	 */
	public function shouldThrowInvalidArgumentExceptionIfGivenUrlIsEmpty()
	{
		$this->expectException(\InvalidArgumentException::class);
		
		ShopDetails::create($this->version, '', $this->key, $this->languages, $this->defaultLanguage, $this->countries);
	}
	
	
	/**
	 * @test
	 */
	public function shouldThrowInvalidArgumentExceptionIfGivenUrlIsInvalid()
	{
		$this->expectException(\InvalidArgumentException::class);
		
		ShopDetails::create($this->version, 'invalid-url', $this->key, $this->languages, $this->defaultLanguage,
		                    $this->countries);
	}
	
	
	/**
	 * @test
	 */
	public function shouldReturnGivenVersion()
	{
		$this->assertSame($this->shopDetails->version(), $this->version);
	}
	
	
	/**
	 * @test
	 */
	public function shouldReturnGivenUrl()
	{
		$this->assertSame($this->shopDetails->url(), $this->url);
	}
	
	
	/**
	 * @test
	 */
	public function shouldReturnGivenKey()
	{
		$this->assertSame($this->shopDetails->key(), $this->key);
	}
	
	
	/**
	 * @test
	 */
	public function shouldReturnGivenLanguages()
	{
		$this->assertSame($this->shopDetails->languages(), $this->languages);
	}
	
	
	/**
	 * @test
	 */
	public function shouldReturnGivenDefaultLanguage()
	{
		$this->assertSame($this->shopDetails->defaultLanguage(), $this->defaultLanguage);
	}
	
	
	/**
	 * @test
	 */
	public function shouldReturnGivenCountries()
	{
		$this->assertSame($this->shopDetails->countries(), $this->countries);
	}
}