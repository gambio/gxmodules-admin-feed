<?php
/* --------------------------------------------------------------
   ShopDetailsRepositoryTest.inc.php 2018-08-01
   Gambio GmbH
   http://www.gambio.de
   Copyright (c) 2018 Gambio GmbH
   Released under the GNU General Public License (Version 2)
   [http://www.gnu.org/licenses/gpl-2.0.html]
   --------------------------------------------------------------
*/

use Gambio\AdminFeed\Services\ShopInformation\Mapper\ShopDetailsMapper;
use Gambio\AdminFeed\Services\ShopInformation\Repositories\ShopDetailsRepository;
use Gambio\AdminFeed\Services\ShopInformation\ValueObjects\ShopDetails;
use PHPUnit\Framework\TestCase;

/**
 * Class ShopDetailsRepositoryTest
 */
class ShopDetailsRepositoryTest extends TestCase
{
	/**
	 * @var \Gambio\AdminFeed\Services\ShopInformation\ValueObjects\ShopDetails
	 */
	private $details;
	
	/**
	 * @var \Gambio\AdminFeed\Services\ShopInformation\Mapper\ShopDetailsMapper
	 */
	private $mapper;
	
	/**
	 * @var \Gambio\AdminFeed\Services\ShopInformation\Repositories\ShopDetailsRepository
	 */
	private $repository;
	
	
	public function setUp()
	{
		$this->details = $this->createMock(ShopDetails::class);
		
		$this->mapper = $this->createMock(ShopDetailsMapper::class);
		$this->mapper->method('getShopDetails')->willReturn($this->details);
		
		$this->repository = new ShopDetailsRepository($this->mapper);
	}
	
	
	/**
	 * @test
	 */
	public function shouldReturnExpectedShopDetails()
	{
		$expectedDetails = $this->details;
		$actualDetails   = $this->repository->getShopDetails();
		
		$this->assertEquals($expectedDetails, $actualDetails);
	}
}