<?php
/* --------------------------------------------------------------
   MerchantDetailsRepositoryTest.inc.php 2018-08-01
   Gambio GmbH
   http://www.gambio.de
   Copyright (c) 2018 Gambio GmbH
   Released under the GNU General Public License (Version 2)
   [http://www.gnu.org/licenses/gpl-2.0.html]
   --------------------------------------------------------------
*/

use Gambio\AdminFeed\Services\ShopInformation\Mapper\MerchantDetailsMapper;
use Gambio\AdminFeed\Services\ShopInformation\Repositories\MerchantDetailsRepository;
use Gambio\AdminFeed\Services\ShopInformation\ValueObjects\MerchantDetails;
use PHPUnit\Framework\TestCase;

/**
 * Class MerchantDetailsRepositoryTest
 */
class MerchantDetailsRepositoryTest extends TestCase
{
	/**
	 * @var \Gambio\AdminFeed\Services\ShopInformation\ValueObjects\MerchantDetails
	 */
	private $details;
	
	/**
	 * @var \Gambio\AdminFeed\Services\ShopInformation\Mapper\MerchantDetailsMapper
	 */
	private $mapper;
	
	/**
	 * @var \Gambio\AdminFeed\Services\ShopInformation\Repositories\MerchantDetailsRepository
	 */
	private $repository;
	
	
	public function setUp()
	{
		$this->details = $this->createMock(MerchantDetails::class);
		
		$this->mapper = $this->createMock(MerchantDetailsMapper::class);
		$this->mapper->method('getMerchantDetails')->willReturn($this->details);
		
		$this->repository = new MerchantDetailsRepository($this->mapper);
	}
	
	
	/**
	 * @test
	 */
	public function shouldReturnExpectedMerchantDetails()
	{
		$expectedDetails = $this->details;
		$actualDetails   = $this->repository->getMerchantDetails();
		
		$this->assertEquals($expectedDetails, $actualDetails);
	}
}