<?php
/* --------------------------------------------------------------
   ServerDetailsSerializerTest.inc.php 2018-08-01
   Gambio GmbH
   http://www.gambio.de
   Copyright (c) 2018 Gambio GmbH
   Released under the GNU General Public License (Version 2)
   [http://www.gnu.org/licenses/gpl-2.0.html]
   --------------------------------------------------------------
*/

use Gambio\AdminFeed\Services\ShopInformation\Serializer\MysqlServerDetailsSerializer;
use Gambio\AdminFeed\Services\ShopInformation\Serializer\PhpServerDetailsSerializer;
use Gambio\AdminFeed\Services\ShopInformation\Serializer\ServerDetailsSerializer;
use Gambio\AdminFeed\Services\ShopInformation\ValueObjects\MysqlServerDetails;
use Gambio\AdminFeed\Services\ShopInformation\ValueObjects\PhpServerDetails;
use Gambio\AdminFeed\Services\ShopInformation\ValueObjects\ServerDetails;
use PHPUnit\Framework\TestCase;

/**
 * Class ServerDetailsSerializerTest
 */
class ServerDetailsSerializerTest extends TestCase
{
	/**
	 * @var array
	 */
	private $data;
	
	/**
	 * @var \Gambio\AdminFeed\Services\ShopInformation\ValueObjects\MerchantAddressDetails
	 */
	private $object;
	
	/**
	 * @var \Gambio\AdminFeed\Services\ShopInformation\Serializer\MerchantDetailsSerializer
	 */
	private $serializer;
	
	
	#[\Override]
 public function setUp()
	{
		$phpDetails   = $this->createMock(PhpServerDetails::class);
		$mysqlDetails = $this->createMock(MysqlServerDetails::class);
		$webserver    = 'Apache';
		$os           = 'Linux';
		
		$this->data = [
			'php'       => [],
			'mysql'     => [],
			'webserver' => $webserver,
			'os'        => $os,
		];
		
		$this->object = ServerDetails::create($phpDetails, $mysqlDetails, $webserver, $os);
		
		$phpServerDetailsSerializer = $this->createMock(PhpServerDetailsSerializer::class);
		$phpServerDetailsSerializer->method('serialize')->willReturn([]);
		$phpServerDetailsSerializer->method('deserialize')->willReturn($phpDetails);
		
		$mysqlServerDetailsSerializer = $this->createMock(MysqlServerDetailsSerializer::class);
		$mysqlServerDetailsSerializer->method('serialize')->willReturn([]);
		$mysqlServerDetailsSerializer->method('deserialize')->willReturn($mysqlDetails);
		
		$this->serializer = new ServerDetailsSerializer($phpServerDetailsSerializer, $mysqlServerDetailsSerializer);
	}
	
	
	/**
	 * @test
	 */
	public function shouldSerializeCorrectly(): void
	{
		$actual   = $this->serializer->serialize($this->object);
		$expected = $this->data;
		
		$this->assertSame($expected, $actual);
	}
	
	
	/**
	 * @test
	 */
	public function shouldDeserializeCorrectly(): void
	{
		$actual   = $this->serializer->deserialize($this->data);
		$expected = $this->object;
		
		$this->assertEquals($expected, $actual);
	}
}