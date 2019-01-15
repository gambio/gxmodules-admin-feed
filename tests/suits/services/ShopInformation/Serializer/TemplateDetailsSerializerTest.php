<?php
/* --------------------------------------------------------------
   TemplateDetailsSerializerTest.inc.php 2019-01-15
   Gambio GmbH
   http://www.gambio.de
   Copyright (c) 2019 Gambio GmbH
   Released under the GNU General Public License (Version 2)
   [http://www.gnu.org/licenses/gpl-2.0.html]
   --------------------------------------------------------------
*/

use Gambio\AdminFeed\Services\ShopInformation\Serializer\TemplateDetailsSerializer;
use Gambio\AdminFeed\Services\ShopInformation\ValueObjects\TemplateDetails;
use PHPUnit\Framework\TestCase;

/**
 * Class TemplateDetailsSerializerTest
 */
class TemplateDetailsSerializerTest extends TestCase
{
	/**
	 * @var array
	 */
	private $data;
	
	/**
	 * @var \Gambio\AdminFeed\Services\ShopInformation\ValueObjects\TemplateDetails
	 */
	private $object;
	
	/**
	 * @var \Gambio\AdminFeed\Services\ShopInformation\Serializer\TemplateDetailsSerializer
	 */
	private $serializer;
	
	
	public function setUp()
	{
		$available = ['templates/HoneyGrid', 'templates/EyeCandy'];
		$selected  = 'templates/HoneyGrid';
		$version   = '3';
		
		$this->data = [
			'available' => $available,
			'selected'  => $selected,
			'version'   => $version,
		];
		
		$this->object = TemplateDetails::create($available, $selected, $version);
		
		$this->serializer = new TemplateDetailsSerializer();
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