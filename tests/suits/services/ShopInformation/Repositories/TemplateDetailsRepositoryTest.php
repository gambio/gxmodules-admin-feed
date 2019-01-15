<?php
/* --------------------------------------------------------------
   TemplateDetailsRepositoryTest.inc.php 2019-01-15
   Gambio GmbH
   http://www.gambio.de
   Copyright (c) 2019 Gambio GmbH
   Released under the GNU General Public License (Version 2)
   [http://www.gnu.org/licenses/gpl-2.0.html]
   --------------------------------------------------------------
*/

use Gambio\AdminFeed\Services\ShopInformation\Mapper\TemplateDetailsMapper;
use Gambio\AdminFeed\Services\ShopInformation\Repositories\TemplateDetailsRepository;
use Gambio\AdminFeed\Services\ShopInformation\ValueObjects\ThemeDetails;
use PHPUnit\Framework\TestCase;

/**
 * Class TemplateDetailsRepositoryTest
 */
class TemplateDetailsRepositoryTest extends TestCase
{
	/**
	 * @var \Gambio\AdminFeed\Services\ShopInformation\ValueObjects\ThemeDetails
	 */
	private $details;
	
	/**
	 * @var \Gambio\AdminFeed\Services\ShopInformation\Mapper\TemplateDetailsMapper
	 */
	private $mapper;
	
	/**
	 * @var \Gambio\AdminFeed\Services\ShopInformation\Repositories\TemplateDetailsRepository
	 */
	private $repository;
	
	
	public function setUp()
	{
		$this->details = $this->createMock(ThemeDetails::class);
		
		$this->mapper = $this->createMock(TemplateDetailsMapper::class);
		$this->mapper->method('getTemplateDetails')->willReturn($this->details);
		
		$this->repository = new TemplateDetailsRepository($this->mapper);
	}
	
	
	/**
	 * @test
	 */
	public function shouldReturnExpectedTemplateDetails()
	{
		$expectedDetails = $this->details;
		$actualDetails   = $this->repository->getTemplateDetails();
		
		$this->assertEquals($expectedDetails, $actualDetails);
	}
}