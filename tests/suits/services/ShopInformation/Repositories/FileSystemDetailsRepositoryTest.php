<?php
/* --------------------------------------------------------------
   FileSystemDetailsRepositoryTest.inc.php 2018-08-01
   Gambio GmbH
   http://www.gambio.de
   Copyright (c) 2018 Gambio GmbH
   Released under the GNU General Public License (Version 2)
   [http://www.gnu.org/licenses/gpl-2.0.html]
   --------------------------------------------------------------
*/

use Gambio\AdminFeed\Services\ShopInformation\Mapper\FileSystemDetailsMapper;
use Gambio\AdminFeed\Services\ShopInformation\Repositories\FileSystemDetailsRepository;
use Gambio\AdminFeed\Services\ShopInformation\ValueObjects\FileSystemDetails;
use PHPUnit\Framework\TestCase;

/**
 * Class FileSystemDetailsRepositoryTest
 */
class FileSystemDetailsRepositoryTest extends TestCase
{
	/**
	 * @var \Gambio\AdminFeed\Services\ShopInformation\ValueObjects\FileSystemDetails
	 */
	private $details;
	
	/**
	 * @var \Gambio\AdminFeed\Services\ShopInformation\Mapper\FileSystemDetailsMapper
	 */
	private $mapper;
	
	/**
	 * @var \Gambio\AdminFeed\Services\ShopInformation\Repositories\FileSystemDetailsRepository
	 */
	private $repository;
	
	
	#[\Override]
 public function setUp()
	{
		$this->details = $this->createMock(FileSystemDetails::class);
		
		$this->mapper = $this->createMock(FileSystemDetailsMapper::class);
		$this->mapper->method('getFileSystemDetails')->willReturn($this->details);
		
		$this->repository = new FileSystemDetailsRepository($this->mapper);
	}
	
	
	/**
	 * @test
	 */
	public function shouldReturnExpectedFileSystemDetails(): void
	{
		$expectedDetails = $this->details;
		$actualDetails   = $this->repository->getFileSystemDetails();
		
		$this->assertEquals($expectedDetails, $actualDetails);
	}
}