<?php
/* --------------------------------------------------------------
   MysqlServerDetailsSerializerTest.inc.php 2018-08-01
   Gambio GmbH
   http://www.gambio.de
   Copyright (c) 2018 Gambio GmbH
   Released under the GNU General Public License (Version 2)
   [http://www.gnu.org/licenses/gpl-2.0.html]
   --------------------------------------------------------------
*/

use Gambio\AdminFeed\Services\ShopInformation\Serializer\MysqlServerDetailsSerializer;
use Gambio\AdminFeed\Services\ShopInformation\ValueObjects\MysqlServerDetails;
use PHPUnit\Framework\TestCase;

/**
 * Class MysqlServerDetailsSerializerTest
 */
class MysqlServerDetailsSerializerTest extends TestCase
{
	/**
	 * @var array
	 */
	private $data;
	
	/**
	 * @var \Gambio\AdminFeed\Services\ShopInformation\ValueObjects\MysqlServerDetails
	 */
	private $object;
	
	/**
	 * @var \Gambio\AdminFeed\Services\ShopInformation\Serializer\MysqlServerDetailsSerializer
	 */
	private $serializer;
	
	
	public function setUp()
	{
		$version       = 'v1.0.1';
		$engines       = ['InnoDB', 'MyISAM'];
		$defaultEngine = 'InnoDB';
		
		$this->data = [
			'version'       => $version,
			'engines'       => $engines,
			'defaultEngine' => $defaultEngine,
		];
		
		$this->object = MysqlServerDetails::create($version, $engines, $defaultEngine);
		
		$this->serializer = new MysqlServerDetailsSerializer();
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