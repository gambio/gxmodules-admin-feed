<?php
/* --------------------------------------------------------------
   ModulesDetailsRepositoryTest.inc.php 2018-08-01
   Gambio GmbH
   http://www.gambio.de
   Copyright (c) 2018 Gambio GmbH
   Released under the GNU General Public License (Version 2)
   [http://www.gnu.org/licenses/gpl-2.0.html]
   --------------------------------------------------------------
*/

use Gambio\AdminFeed\Services\ShopInformation\Mapper\ModulesDetailsMapper;
use Gambio\AdminFeed\Services\ShopInformation\Repositories\ModulesDetailsRepository;
use Gambio\AdminFeed\Services\ShopInformation\ValueObjects\ModulesDetails;
use PHPUnit\Framework\TestCase;

/**
 * Class ModulesDetailsRepositoryTest
 */
class ModulesDetailsRepositoryTest extends TestCase
{
	/**
	 * @var \Gambio\AdminFeed\Services\ShopInformation\ValueObjects\ModulesDetails
	 */
	private $details;
	
	/**
	 * @var \Gambio\AdminFeed\Services\ShopInformation\Mapper\ModulesDetailsMapper
	 */
	private $mapper;
	
	/**
	 * @var \Gambio\AdminFeed\Services\ShopInformation\Repositories\ModulesDetailsRepository
	 */
	private $repository;
	
	
	#[\Override]
 public function setUp()
	{
		$this->details = $this->createMock(ModulesDetails::class);
		
		$this->mapper = $this->createMock(ModulesDetailsMapper::class);
		$this->mapper->method('getModulesDetails')->willReturn($this->details);
		
		$this->repository = new ModulesDetailsRepository($this->mapper);
	}
	
	
	/**
	 * @test
	 */
	public function shouldReturnExpectedModulesDetails(): void
	{
		$expectedDetails = $this->details;
		$actualDetails   = $this->repository->getModulesDetails();
		
		$this->assertEquals($expectedDetails, $actualDetails);
	}
}