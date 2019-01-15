<?php
/* --------------------------------------------------------------
   ShopInformationSerializerTest.inc.php 2019-01-15
   Gambio GmbH
   http://www.gambio.de
   Copyright (c) 2019 Gambio GmbH
   Released under the GNU General Public License (Version 2)
   [http://www.gnu.org/licenses/gpl-2.0.html]
   --------------------------------------------------------------
*/

use Gambio\AdminFeed\Services\ShopInformation\Entities\ShopInformation;
use Gambio\AdminFeed\Services\ShopInformation\Serializer\FileSystemDetailsSerializer;
use Gambio\AdminFeed\Services\ShopInformation\Serializer\MerchantDetailsSerializer;
use Gambio\AdminFeed\Services\ShopInformation\Serializer\ModulesDetailsSerializer;
use Gambio\AdminFeed\Services\ShopInformation\Serializer\ServerDetailsSerializer;
use Gambio\AdminFeed\Services\ShopInformation\Serializer\ShopDetailsSerializer;
use Gambio\AdminFeed\Services\ShopInformation\Serializer\ShopInformationSerializer;
use Gambio\AdminFeed\Services\ShopInformation\Serializer\ThemeDetailsSerializer;
use Gambio\AdminFeed\Services\ShopInformation\Serializer\UpdatesDetailsSerializer;
use Gambio\AdminFeed\Services\ShopInformation\ValueObjects\FileSystemDetails;
use Gambio\AdminFeed\Services\ShopInformation\ValueObjects\MerchantDetails;
use Gambio\AdminFeed\Services\ShopInformation\ValueObjects\ModulesDetails;
use Gambio\AdminFeed\Services\ShopInformation\ValueObjects\ServerDetails;
use Gambio\AdminFeed\Services\ShopInformation\ValueObjects\ShopDetails;
use Gambio\AdminFeed\Services\ShopInformation\ValueObjects\ThemeDetails;
use Gambio\AdminFeed\Services\ShopInformation\ValueObjects\UpdatesDetails;
use PHPUnit\Framework\TestCase;

/**
 * Class ShopInformationSerializerTest
 */
class ShopInformationSerializerTest extends TestCase
{
	/**
	 * @var array
	 */
	private $data;
	
	/**
	 * @var \Gambio\AdminFeed\Services\ShopInformation\Entities\ShopInformation
	 */
	private $object;
	
	/**
	 * @var \Gambio\AdminFeed\Services\ShopInformation\Serializer\ShopInformationSerializer
	 */
	private $serializer;
	
	
	public function setUp()
	{
		$shopDetails       = $this->createMock(ShopDetails::class);
		$serverDetails     = $this->createMock(ServerDetails::class);
		$modulesDetails    = $this->createMock(ModulesDetails::class);
		$themeDetails  = $this->createMock(ThemeDetails::class);
		$fileSystemDetails = $this->createMock(FileSystemDetails::class);
		$updatesDetails    = $this->createMock(UpdatesDetails::class);
		
		$this->data = [
			'shop'       => [],
			'server'     => [],
			'modules'    => [],
			'themes'  => [],
			'filesystem' => [],
			'updates'    => [],
		];
		
		$this->object = ShopInformation::create($shopDetails, $serverDetails, $modulesDetails, $themeDetails,
		                                        $fileSystemDetails, $updatesDetails);
		
		$shopDetailsSerializer = $this->createMock(ShopDetailsSerializer::class);
		$shopDetailsSerializer->method('serialize')->willReturn([]);
		$shopDetailsSerializer->method('deserialize')->willReturn($shopDetails);
		
		$serverDetailsSerializer = $this->createMock(ServerDetailsSerializer::class);
		$serverDetailsSerializer->method('serialize')->willReturn([]);
		$serverDetailsSerializer->method('deserialize')->willReturn($serverDetails);
		
		$modulesDetailsSerializer = $this->createMock(ModulesDetailsSerializer::class);
		$modulesDetailsSerializer->method('serialize')->willReturn([]);
		$modulesDetailsSerializer->method('deserialize')->willReturn($modulesDetails);
		
		$themeDetailsSerializer = $this->createMock(ThemeDetailsSerializer::class);
		$themeDetailsSerializer->method('serialize')->willReturn([]);
		$themeDetailsSerializer->method('deserialize')->willReturn($themeDetails);
		
		$fileSystemDetailsSerializer = $this->createMock(FileSystemDetailsSerializer::class);
		$fileSystemDetailsSerializer->method('serialize')->willReturn([]);
		$fileSystemDetailsSerializer->method('deserialize')->willReturn($fileSystemDetails);
		
		$updatesDetailsSerializer = $this->createMock(UpdatesDetailsSerializer::class);
		$updatesDetailsSerializer->method('serialize')->willReturn([]);
		$updatesDetailsSerializer->method('deserialize')->willReturn($updatesDetails);
		
		$this->serializer = new ShopInformationSerializer($shopDetailsSerializer, $serverDetailsSerializer,
		                                                  $modulesDetailsSerializer, $themeDetailsSerializer,
		                                                  $fileSystemDetailsSerializer, $updatesDetailsSerializer);
	}
	
	
	/**
	 * @test
	 */
	public function shouldSerializeCorrectly()
	{
		$actual   = $this->serializer->serialize($this->object);
		$expected = $this->data;
		
		$this->assertSame($expected, $actual);
	}
	
	
	/**
	 * @test
	 */
	public function shouldDeserializeCorrectly()
	{
		$actual   = $this->serializer->deserialize($this->data);
		$expected = $this->object;
		
		$this->assertEquals($expected, $actual);
	}
}