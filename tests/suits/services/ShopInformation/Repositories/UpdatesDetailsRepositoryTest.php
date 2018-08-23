<?php
/* --------------------------------------------------------------
   UpdatesDetailsRepositoryTest.inc.php 2018-08-01
   Gambio GmbH
   http://www.gambio.de
   Copyright (c) 2018 Gambio GmbH
   Released under the GNU General Public License (Version 2)
   [http://www.gnu.org/licenses/gpl-2.0.html]
   --------------------------------------------------------------
*/

use Gambio\AdminFeed\Services\ShopInformation\Mapper\UpdatesDetailsMapper;
use Gambio\AdminFeed\Services\ShopInformation\Repositories\UpdatesDetailsRepository;
use Gambio\AdminFeed\Services\ShopInformation\ValueObjects\UpdatesDetails;
use PHPUnit\Framework\TestCase;

/**
 * Class UpdatesDetailsRepositoryTest
 */
class UpdatesDetailsRepositoryTest extends TestCase
{
	/**
	 * @var \Gambio\AdminFeed\Services\ShopInformation\ValueObjects\UpdatesDetails
	 */
	private $details;
	
	/**
	 * @var \Gambio\AdminFeed\Services\ShopInformation\Mapper\UpdatesDetailsMapper
	 */
	private $mapper;
	
	/**
	 * @var \Gambio\AdminFeed\Services\ShopInformation\Repositories\UpdatesDetailsRepository
	 */
	private $repository;
	
	
	public function setUp()
	{
		$this->details = $this->createMock(UpdatesDetails::class);
		
		$this->mapper = $this->createMock(UpdatesDetailsMapper::class);
		$this->mapper->method('getUpdatesDetails')->willReturn($this->details);
		
		$this->repository = new UpdatesDetailsRepository($this->mapper);
	}
	
	
	/**
	 * @test
	 */
	public function shouldReturnExpectedUpdatesDetails()
	{
		$expectedDetails = $this->details;
		$actualDetails   = $this->repository->getUpdatesDetails();
		
		$this->assertEquals($expectedDetails, $actualDetails);
	}
}