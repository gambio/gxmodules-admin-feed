<?php
/* --------------------------------------------------------------
   UpdateDetailsSerializerTest.inc.php 2018-08-01
   Gambio GmbH
   http://www.gambio.de
   Copyright (c) 2018 Gambio GmbH
   Released under the GNU General Public License (Version 2)
   [http://www.gnu.org/licenses/gpl-2.0.html]
   --------------------------------------------------------------
*/

use Gambio\AdminFeed\Services\ShopInformation\Serializer\FileSystemDetailsSerializer;
use Gambio\AdminFeed\Services\ShopInformation\ShopInformationService;
use Gambio\AdminFeed\Services\ShopInformation\ValueObjects\FileSystemDetails;
use PHPUnit\Framework\TestCase;

/**
 * Class UpdateDetailsSerializerTest
 */
class UpdateDetailsSerializerTest extends TestCase
{
	/**
	 * @var array
	 */
	private $data;
	
	/**
	 * @var \Gambio\AdminFeed\Services\ShopInformation\ValueObjects\FileSystemDetails
	 */
	private $object;
	
	
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
	}
	
	
	/**
	 * @test
	 */
	public function shouldSerializeCorrectly()
	{
		$expected = FileSystemDetailsSerializer::serialize($this->object);
		$actual   = $this->data;
		
		$this->assertSame($expected, $actual);
	}
	
	
	/**
	 * @test
	 */
	public function shouldDeserializeCorrectly()
	{
		$expected = FileSystemDetailsSerializer::deserialize($this->data);
		$actual   = $this->object;
		
		$this->assertEquals($expected, $actual);
	}
}