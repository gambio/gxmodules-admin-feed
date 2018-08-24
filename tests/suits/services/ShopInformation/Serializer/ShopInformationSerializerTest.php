<?php
/* --------------------------------------------------------------
   ShopInformationSerializerTest.inc.php 2018-08-01
   Gambio GmbH
   http://www.gambio.de
   Copyright (c) 2018 Gambio GmbH
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
use Gambio\AdminFeed\Services\ShopInformation\Serializer\TemplateDetailsSerializer;
use Gambio\AdminFeed\Services\ShopInformation\Serializer\UpdatesDetailsSerializer;
use Gambio\AdminFeed\Services\ShopInformation\ValueObjects\FileSystemDetails;
use Gambio\AdminFeed\Services\ShopInformation\ValueObjects\MerchantDetails;
use Gambio\AdminFeed\Services\ShopInformation\ValueObjects\ModulesDetails;
use Gambio\AdminFeed\Services\ShopInformation\ValueObjects\ServerDetails;
use Gambio\AdminFeed\Services\ShopInformation\ValueObjects\ShopDetails;
use Gambio\AdminFeed\Services\ShopInformation\ValueObjects\TemplateDetails;
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
		$templatesDetails  = $this->createMock(TemplateDetails::class);
		$fileSystemDetails = $this->createMock(FileSystemDetails::class);
		$merchantDetails   = $this->createMock(MerchantDetails::class);
		$updatesDetails    = $this->createMock(UpdatesDetails::class);
		
		$this->data = [
			'shop'       => [],
			'server'     => [],
			'modules'    => [],
			'templates'  => [],
			'filesystem' => [],
			'merchant'   => [],
			'updates'    => [],
		];
		
		$this->object = ShopInformation::create($shopDetails, $serverDetails, $modulesDetails, $templatesDetails,
		                                        $fileSystemDetails, $merchantDetails, $updatesDetails);
		
		$shopDetailsSerializer = $this->createMock(ShopDetailsSerializer::class);
		$shopDetailsSerializer->method('serialize')->willReturn([]);
		$shopDetailsSerializer->method('deserialize')->willReturn($shopDetails);
		
		$serverDetailsSerializer = $this->createMock(ServerDetailsSerializer::class);
		$serverDetailsSerializer->method('serialize')->willReturn([]);
		$serverDetailsSerializer->method('deserialize')->willReturn($serverDetails);
		
		$modulesDetailsSerializer = $this->createMock(ModulesDetailsSerializer::class);
		$modulesDetailsSerializer->method('serialize')->willReturn([]);
		$modulesDetailsSerializer->method('deserialize')->willReturn($modulesDetails);
		
		$templateDetailsSerializer = $this->createMock(TemplateDetailsSerializer::class);
		$templateDetailsSerializer->method('serialize')->willReturn([]);
		$templateDetailsSerializer->method('deserialize')->willReturn($templatesDetails);
		
		$fileSystemDetailsSerializer = $this->createMock(FileSystemDetailsSerializer::class);
		$fileSystemDetailsSerializer->method('serialize')->willReturn([]);
		$fileSystemDetailsSerializer->method('deserialize')->willReturn($fileSystemDetails);
		
		$merchantDetailsSerializer = $this->createMock(MerchantDetailsSerializer::class);
		$merchantDetailsSerializer->method('serialize')->willReturn([]);
		$merchantDetailsSerializer->method('deserialize')->willReturn($merchantDetails);
		
		$updatesDetailsSerializer = $this->createMock(UpdatesDetailsSerializer::class);
		$updatesDetailsSerializer->method('serialize')->willReturn([]);
		$updatesDetailsSerializer->method('deserialize')->willReturn($updatesDetails);
		
		$this->serializer = new ShopInformationSerializer($shopDetailsSerializer, $serverDetailsSerializer,
		                                                  $modulesDetailsSerializer, $templateDetailsSerializer,
		                                                  $fileSystemDetailsSerializer, $merchantDetailsSerializer,
		                                                  $updatesDetailsSerializer);
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