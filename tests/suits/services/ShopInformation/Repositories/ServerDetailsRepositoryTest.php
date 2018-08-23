<?php
/* --------------------------------------------------------------
   ServerDetailsRepositoryTest.inc.php 2018-08-01
   Gambio GmbH
   http://www.gambio.de
   Copyright (c) 2018 Gambio GmbH
   Released under the GNU General Public License (Version 2)
   [http://www.gnu.org/licenses/gpl-2.0.html]
   --------------------------------------------------------------
*/

use Gambio\AdminFeed\Services\ShopInformation\Mapper\ServerDetailsMapper;
use Gambio\AdminFeed\Services\ShopInformation\Repositories\ServerDetailsRepository;
use Gambio\AdminFeed\Services\ShopInformation\ValueObjects\ServerDetails;
use PHPUnit\Framework\TestCase;

/**
 * Class ServerDetailsRepositoryTest
 */
class ServerDetailsRepositoryTest extends TestCase
{
	/**
	 * @var \Gambio\AdminFeed\Services\ShopInformation\ValueObjects\ServerDetails
	 */
	private $details;
	
	/**
	 * @var \Gambio\AdminFeed\Services\ShopInformation\Mapper\ServerDetailsMapper
	 */
	private $mapper;
	
	/**
	 * @var \Gambio\AdminFeed\Services\ShopInformation\Repositories\ServerDetailsRepository
	 */
	private $repository;
	
	
	public function setUp()
	{
		$this->details = $this->createMock(ServerDetails::class);
		
		$this->mapper = $this->createMock(ServerDetailsMapper::class);
		$this->mapper->method('getServerDetails')->willReturn($this->details);
		
		$this->repository = new ServerDetailsRepository($this->mapper);
	}
	
	
	/**
	 * @test
	 */
	public function shouldReturnExpectedServerDetails()
	{
		$expectedDetails = $this->details;
		$actualDetails   = $this->repository->getServerDetails();
		
		$this->assertEquals($expectedDetails, $actualDetails);
	}
}