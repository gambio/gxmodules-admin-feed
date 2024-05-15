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
	
	
	#[\Override]
 public function setUp()
	{
		$this->shopDetails = ShopDetails::create($this->version, $this->url, $this->key, $this->languages,
		                                         $this->defaultLanguage, $this->countries);
	}
	
	
	/**
	 * @test
	 */
	public function shouldThrowInvalidArgumentExceptionIfGivenVersionIsEmpty(): void
	{
		$this->expectException(\InvalidArgumentException::class);
		
		ShopDetails::create('', $this->url, $this->key, $this->languages, $this->defaultLanguage, $this->countries);
	}
	
	
	/**
	 * @test
	 */
	public function shouldThrowInvalidArgumentExceptionIfGivenUrlIsEmpty(): void
	{
		$this->expectException(\InvalidArgumentException::class);
		
		ShopDetails::create($this->version, '', $this->key, $this->languages, $this->defaultLanguage, $this->countries);
	}
	
	
	/**
	 * @test
	 */
	public function shouldThrowInvalidArgumentExceptionIfGivenUrlIsInvalid(): void
	{
		$this->expectException(\InvalidArgumentException::class);
		
		ShopDetails::create($this->version, 'invalid-url', $this->key, $this->languages, $this->defaultLanguage,
		                    $this->countries);
	}
	
	
	/**
	 * @test
	 */
	public function shouldReturnGivenVersion(): void
	{
		$this->assertSame($this->shopDetails->version(), $this->version);
	}
	
	
	/**
	 * @test
	 */
	public function shouldReturnGivenUrl(): void
	{
		$this->assertSame($this->shopDetails->url(), $this->url);
	}
	
	
	/**
	 * @test
	 */
	public function shouldReturnGivenKey(): void
	{
		$this->assertSame($this->shopDetails->key(), $this->key);
	}
	
	
	/**
	 * @test
	 */
	public function shouldReturnGivenLanguages(): void
	{
		$this->assertSame($this->shopDetails->languages(), $this->languages);
	}
	
	
	/**
	 * @test
	 */
	public function shouldReturnGivenDefaultLanguage(): void
	{
		$this->assertSame($this->shopDetails->defaultLanguage(), $this->defaultLanguage);
	}
	
	
	/**
	 * @test
	 */
	public function shouldReturnGivenCountries(): void
	{
		$this->assertSame($this->shopDetails->countries(), $this->countries);
	}
}