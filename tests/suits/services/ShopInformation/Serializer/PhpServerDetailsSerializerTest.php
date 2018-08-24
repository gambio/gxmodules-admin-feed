<?php
/* --------------------------------------------------------------
   PhpServerDetailsSerializerTest.inc.php 2018-08-01
   Gambio GmbH
   http://www.gambio.de
   Copyright (c) 2018 Gambio GmbH
   Released under the GNU General Public License (Version 2)
   [http://www.gnu.org/licenses/gpl-2.0.html]
   --------------------------------------------------------------
*/

use Gambio\AdminFeed\Services\ShopInformation\Serializer\PhpServerDetailsSerializer;
use Gambio\AdminFeed\Services\ShopInformation\ValueObjects\PhpServerDetails;
use PHPUnit\Framework\TestCase;

/**
 * Class PhpServerDetailsSerializerTest
 */
class PhpServerDetailsSerializerTest extends TestCase
{
	/**
	 * @var array
	 */
	private $data;
	
	/**
	 * @var \Gambio\AdminFeed\Services\ShopInformation\ValueObjects\PhpServerDetails
	 */
	private $object;
	
	/**
	 * @var \Gambio\AdminFeed\Services\ShopInformation\Serializer\PhpServerDetailsSerializer
	 */
	private $serializer;
	
	
	public function setUp()
	{
		$version       = 'v1.0.1';
		$extensions    = ['curl', 'xml', 'zip'];
		$configuration = ['max_execution_time' => 30];
		
		$this->data = [
			'version'       => $version,
			'extensions'    => $extensions,
			'configuration' => $configuration,
		];
		
		$this->object = PhpServerDetails::create($version, $extensions, $configuration);
		
		$this->serializer = new PhpServerDetailsSerializer();
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