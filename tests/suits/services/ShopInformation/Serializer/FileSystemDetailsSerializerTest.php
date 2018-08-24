<?php
/* --------------------------------------------------------------
   FileSystemDetailsSerializerTest.inc.php 2018-08-01
   Gambio GmbH
   http://www.gambio.de
   Copyright (c) 2018 Gambio GmbH
   Released under the GNU General Public License (Version 2)
   [http://www.gnu.org/licenses/gpl-2.0.html]
   --------------------------------------------------------------
*/

use Gambio\AdminFeed\Services\ShopInformation\Serializer\FileSystemDetailsSerializer;
use Gambio\AdminFeed\Services\ShopInformation\ValueObjects\FileSystemDetails;
use PHPUnit\Framework\TestCase;

/**
 * Class FileSystemDetailsSerializerTest
 */
class FileSystemDetailsSerializerTest extends TestCase
{
	
	/**
	 * @var array
	 */
	private $data;
	
	/**
	 * @var \Gambio\AdminFeed\Services\ShopInformation\ValueObjects\FileSystemDetails
	 */
	private $object;
	
	/**
	 * @var \Gambio\AdminFeed\Services\ShopInformation\Serializer\FileSystemDetailsSerializer
	 */
	private $serializer;
	
	
	public function setUp()
	{
		$usermods                     = [];
		$gxModules                    = ['Gambio/AdminFeed', 'Gambio/Hub'];
		$dangerousTools               = ['hacked.php'];
		$receiptFiles                 = ['auto_updater-2_0_5.php'];
		$globalUsermodDirectoryExists = false;
		$upmDirectoryExists           = true;
		
		$this->data = [
			'usermods'                     => $usermods,
			'gxModules'                    => $gxModules,
			'dangerousTools'               => $dangerousTools,
			'receiptFiles'                 => $receiptFiles,
			'globalUsermodDirectoryExists' => $globalUsermodDirectoryExists,
			'upmDirectoryExists'           => $upmDirectoryExists,
		];
		
		$this->object = FileSystemDetails::create($usermods, $gxModules, $dangerousTools, $receiptFiles,
		                                          $globalUsermodDirectoryExists, $upmDirectoryExists);
		
		$this->serializer = new FileSystemDetailsSerializer();
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