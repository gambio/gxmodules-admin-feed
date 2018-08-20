<?php
/* --------------------------------------------------------------
   ShopDetailsMapperBehaviour.inc.php 2018-08-01
   Gambio GmbH
   http://www.gambio.de
   Copyright (c) 2018 Gambio GmbH
   Released under the GNU General Public License (Version 2)
   [http://www.gnu.org/licenses/gpl-2.0.html]
   --------------------------------------------------------------
*/

use Gambio\AdminFeed\Services\ShopInformation\Mapper\ServerDetailsMapper;
use Gambio\AdminFeed\Services\ShopInformation\Mapper\ShopDetailsMapper;
use Gambio\AdminFeed\Services\ShopInformation\Reader\ServerDetailsReader;
use Gambio\AdminFeed\Services\ShopInformation\Reader\ShopDetailsReader;
use Gambio\AdminFeed\Services\ShopInformation\ValueObjects\MysqlServerDetails;
use Gambio\AdminFeed\Services\ShopInformation\ValueObjects\PhpServerDetails;
use Gambio\AdminFeed\Services\ShopInformation\ValueObjects\ServerDetails;
use Gambio\AdminFeed\Services\ShopInformation\ValueObjects\ShopDetails;
use PHPUnit\Framework\TestCase;

/**
 * Class ShopDetailsMapperBehaviour
 */
class ShopDetailsMapperBehaviour extends TestCase
{
	/**
	 * @var string
	 */
	private $version = 'v3.10.0.1';
	
	/**
	 * @var string
	 */
	private $url = 'http://example.org';
	
	/**
	 * @var string
	 */
	private $key = '12345-67890-12345-67890';
	
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
	private $countries = ['DE', 'AT', 'CH'];
	
	/**
	 * @var string
	 */
	private $name = 'Testshop';
	
	/**
	 * @var string
	 */
	private $owner = 'Gambio GmbH';
	
	
	/**
	 * @var \Gambio\AdminFeed\Services\ShopInformation\Reader\ShopDetailsReader
	 */
	private $reader;
	
	/**
	 * @var \Gambio\AdminFeed\Services\ShopInformation\Mapper\ShopDetailsMapper
	 */
	private $mapper;
	
	
	public function setUp()
	{
		$this->reader = $this->mockReader();
		
		$this->mapper = ShopDetailsMapper::create($this->reader);
	}
	
	
	/**
	 * @test
	 */
	public function shouldReturnExpectedMerchantDetailsDetails()
	{
		$expectedDetails = $this->expectedShopDetails();
		
		$this->assertEquals($this->mapper->getShopDetails(), $expectedDetails);
	}
	
	
	private function expectedShopDetails()
	{
		return new ShopDetails($this->name, $this->owner, $this->version, $this->url, $this->key, $this->languages,
		                       $this->defaultLanguage, $this->countries);
	}
	
	
	private function mockReader()
	{
		$reader = $this->createMock(ShopDetailsReader::class);
		$reader->method('getVersion')->willReturn($this->version);
		$reader->method('getUrl')->willReturn($this->url);
		$reader->method('getKey')->willReturn($this->key);
		$reader->method('getLanguages')->willReturn($this->languages);
		$reader->method('getDefaultLanguage')->willReturn($this->defaultLanguage);
		$reader->method('getCountries')->willReturn($this->countries);
		$reader->method('getName')->willReturn($this->name);
		$reader->method('getOwner')->willReturn($this->owner);
		
		return $reader;
	}
}