<?php
/* --------------------------------------------------------------
   UpdatesDetailsMapperBehaviour.inc.php 2018-08-01
   Gambio GmbH
   http://www.gambio.de
   Copyright (c) 2018 Gambio GmbH
   Released under the GNU General Public License (Version 2)
   [http://www.gnu.org/licenses/gpl-2.0.html]
   --------------------------------------------------------------
*/

use Gambio\AdminFeed\Services\ShopInformation\Collections\UpdateDetailsCollection;
use Gambio\AdminFeed\Services\ShopInformation\Mapper\UpdatesDetailsMapper;
use Gambio\AdminFeed\Services\ShopInformation\Reader\UpdatesDetailsReader;
use Gambio\AdminFeed\Services\ShopInformation\ValueObjects\UpdateDetails;
use Gambio\AdminFeed\Services\ShopInformation\ValueObjects\UpdatesDetails;
use PHPUnit\Framework\TestCase;

/**
 * Class UpdatesDetailsMapperBehaviour
 */
class UpdatesDetailsMapperBehaviour extends TestCase
{
	/**
	 * @var string
	 */
	private $installedUpdatesData = [
		[
			'history_id'        => '2',
			'version'           => '2.0.5',
			'name'              => 'AutoUpdater v2.0.5',
			'type'              => 'update',
			'revision'          => '0',
			'is_full_version'   => '0',
			'installation_date' => '2018-08-01 12:01:00',
			'php_version'       => '7.2.7-1+ubuntu18.04.1+deb.sury.org+1',
			'mysql_version'     => '5.7.22-0ubuntu18.04.1',
			'installed'         => '1',
		],
		[
			'history_id'        => '1',
			'version'           => '3.10.0.0',
			'name'              => 'v3.10.0.0',
			'type'              => 'master_update',
			'revision'          => '0',
			'is_full_version'   => '1',
			'installation_date' => '2018-08-01 12:00:00',
			'php_version'       => '7.2.7-1+ubuntu18.04.1+deb.sury.org+1',
			'mysql_version'     => '5.7.22-0ubuntu18.04.1',
			'installed'         => '1',
		],
	];
	/**
	 * @var string
	 */
	private $downloadedUpdatesData = [
		[
			'name'        => 'Ovisto v2.0.0',
			'date'        => '2018-08-08 00:00:00',
			'receiptFile' => 'ovisto-2_0_0.php',
			'version'     => '2.0.0',
		],
	];
	
	
	/**
	 * @var \Gambio\AdminFeed\Services\ShopInformation\Reader\UpdatesDetailsReader
	 */
	private $reader;
	
	/**
	 * @var \Gambio\AdminFeed\Services\ShopInformation\Mapper\UpdatesDetailsMapper
	 */
	private $mapper;
	
	
	public function setUp()
	{
		$this->reader = $this->mockReader();
		
		$this->mapper = UpdatesDetailsMapper::create($this->reader);
	}
	
	
	/**
	 * @test
	 */
	public function shouldReturnExpectedMerchantDetailsDetails()
	{
		$expectedDetails = $this->expectedUpdatesDetails();
		
		$this->assertEquals($this->mapper->getUpdatesDetails(), $expectedDetails);
	}
	
	
	private function expectedUpdatesDetails()
	{
		$installedUpdates = new UpdateDetailsCollection([
			                                                new UpdateDetails('AutoUpdater v2.0.5', '2.0.5',
			                                                                  new \DateTime('2018-08-01 12:01:00')),
			                                                new UpdateDetails('v3.10.0.0', '3.10.0.0',
			                                                                  new \DateTime('2018-08-01 12:00:00')),
		                                                ]);
		
		$downloadedUpdates = new UpdateDetailsCollection([
			                                                 new UpdateDetails('Ovisto v2.0.0', '2.0.0',
			                                                                   new \DateTime('2018-08-08 00:00:00')),
		                                                 ]);
		
		return new UpdatesDetails($installedUpdates, $downloadedUpdates);
	}
	
	
	private function mockReader()
	{
		$reader = $this->createMock(UpdatesDetailsReader::class);
		$reader->method('getInstalledUpdatesData')->willReturn($this->installedUpdatesData);
		$reader->method('getDownloadedUpdatesData')->willReturn($this->downloadedUpdatesData);
		
		return $reader;
	}
}