<?php
/* --------------------------------------------------------------
   ShopInformationRepositoryTest.inc.php 2019-01-15
   Gambio GmbH
   http://www.gambio.de
   Copyright (c) 2019 Gambio GmbH
   Released under the GNU General Public License (Version 2)
   [http://www.gnu.org/licenses/gpl-2.0.html]
   --------------------------------------------------------------
*/

use Gambio\AdminFeed\Services\ShopInformation\Entities\ShopInformation;
use Gambio\AdminFeed\Services\ShopInformation\Repositories\FileSystemDetailsRepository;
use Gambio\AdminFeed\Services\ShopInformation\Repositories\MerchantDetailsRepository;
use Gambio\AdminFeed\Services\ShopInformation\Repositories\ModulesDetailsRepository;
use Gambio\AdminFeed\Services\ShopInformation\Repositories\ServerDetailsRepository;
use Gambio\AdminFeed\Services\ShopInformation\Repositories\ShopDetailsRepository;
use Gambio\AdminFeed\Services\ShopInformation\Repositories\ShopInformationRepository;
use Gambio\AdminFeed\Services\ShopInformation\Repositories\TemplateDetailsRepository;
use Gambio\AdminFeed\Services\ShopInformation\Repositories\UpdatesDetailsRepository;
use Gambio\AdminFeed\Services\ShopInformation\ValueObjects\FileSystemDetails;
use Gambio\AdminFeed\Services\ShopInformation\ValueObjects\MerchantDetails;
use Gambio\AdminFeed\Services\ShopInformation\ValueObjects\ModulesDetails;
use Gambio\AdminFeed\Services\ShopInformation\ValueObjects\ServerDetails;
use Gambio\AdminFeed\Services\ShopInformation\ValueObjects\ShopDetails;
use Gambio\AdminFeed\Services\ShopInformation\ValueObjects\ThemeDetails;
use Gambio\AdminFeed\Services\ShopInformation\ValueObjects\UpdatesDetails;
use PHPUnit\Framework\TestCase;

/**
 * Class ShopInformationRepositoryTest
 */
class ShopInformationRepositoryTest extends TestCase
{
	/**
	 * @var \Gambio\AdminFeed\Services\ShopInformation\Entities\ShopInformation
	 */
	private $shopInformation;
	
	/**
	 * @var \Gambio\AdminFeed\Services\ShopInformation\ValueObjects\ShopDetails
	 */
	private $shopDetails;
	
	/**
	 * @var \Gambio\AdminFeed\Services\ShopInformation\ValueObjects\ServerDetails
	 */
	private $serverDetails;
	
	/**
	 * @var \Gambio\AdminFeed\Services\ShopInformation\ValueObjects\ModulesDetails
	 */
	private $modulesDetails;
	
	/**
	 * @var \Gambio\AdminFeed\Services\ShopInformation\ValueObjects\ThemeDetails
	 */
	private $templatesDetails;
	
	/**
	 * @var \Gambio\AdminFeed\Services\ShopInformation\ValueObjects\FileSystemDetails
	 */
	private $fileSystemDetails;
	
	/**
	 * @var \Gambio\AdminFeed\Services\ShopInformation\ValueObjects\MerchantDetails
	 */
	private $merchantDetails;
	
	/**
	 * @var \Gambio\AdminFeed\Services\ShopInformation\ValueObjects\UpdatesDetails
	 */
	private $updatesDetails;
	
	
	/**
	 * @var \Gambio\AdminFeed\Services\ShopInformation\Repositories\ShopInformationRepository
	 */
	private $shopInformationRepository;
	
	/**
	 * @var \Gambio\AdminFeed\Services\ShopInformation\Repositories\ShopDetailsRepository
	 */
	private $shopRepository;
	
	/**
	 * @var \Gambio\AdminFeed\Services\ShopInformation\Repositories\ServerDetailsRepository
	 */
	private $serverRepository;
	
	/**
	 * @var \Gambio\AdminFeed\Services\ShopInformation\Repositories\ModulesDetailsRepository
	 */
	private $modulesRepository;
	
	/**
	 * @var \Gambio\AdminFeed\Services\ShopInformation\Repositories\TemplateDetailsRepository
	 */
	private $templatesRepository;
	
	/**
	 * @var \Gambio\AdminFeed\Services\ShopInformation\Repositories\FileSystemDetailsRepository
	 */
	private $fileSystemRepository;
	
	/**
	 * @var \Gambio\AdminFeed\Services\ShopInformation\Repositories\MerchantDetailsRepository
	 */
	private $merchantRepository;
	
	/**
	 * @var \Gambio\AdminFeed\Services\ShopInformation\Repositories\UpdatesDetailsRepository
	 */
	private $updatesRepository;
	
	
	#[\Override]
 public function setUp()
	{
		$this->shopDetails    = $this->createMock(ShopDetails::class);
		$this->shopRepository = $this->createMock(ShopDetailsRepository::class);
		$this->shopRepository->method('getShopDetails')->willReturn($this->shopDetails);
		
		$this->serverDetails    = $this->createMock(ServerDetails::class);
		$this->serverRepository = $this->createMock(ServerDetailsRepository::class);
		$this->serverRepository->method('getServerDetails')->willReturn($this->serverDetails);
		
		$this->modulesDetails    = $this->createMock(ModulesDetails::class);
		$this->modulesRepository = $this->createMock(ModulesDetailsRepository::class);
		$this->modulesRepository->method('getModulesDetails')->willReturn($this->modulesDetails);
		
		$this->templatesDetails    = $this->createMock(ThemeDetails::class);
		$this->templatesRepository = $this->createMock(TemplateDetailsRepository::class);
		$this->templatesRepository->method('getTemplateDetails')->willReturn($this->templatesDetails);
		
		$this->fileSystemDetails    = $this->createMock(FileSystemDetails::class);
		$this->fileSystemRepository = $this->createMock(FileSystemDetailsRepository::class);
		$this->fileSystemRepository->method('getFileSystemDetails')->willReturn($this->fileSystemDetails);
		
		$this->updatesDetails    = $this->createMock(UpdatesDetails::class);
		$this->updatesRepository = $this->createMock(UpdatesDetailsRepository::class);
		$this->updatesRepository->method('getUpdatesDetails')->willReturn($this->updatesDetails);
		
		$this->shopInformation           = ShopInformation::create($this->shopDetails, $this->serverDetails,
		                                                           $this->modulesDetails, $this->templatesDetails,
		                                                           $this->fileSystemDetails, $this->updatesDetails);
		$this->shopInformationRepository = new ShopInformationRepository($this->shopRepository, $this->serverRepository,
		                                                                 $this->modulesRepository,
		                                                                 $this->templatesRepository,
		                                                                 $this->fileSystemRepository,
		                                                                 $this->updatesRepository);
	}
	
	
	/**
	 * @test
	 */
	public function shouldReturnExpectedShopInformation(): void
	{
		$expectedDetails = $this->shopInformation;
		$actualDetails   = $this->shopInformationRepository->getShopInformation();
		
		$this->assertEquals($expectedDetails, $actualDetails);
	}
	
	
	/**
	 * @test
	 */
	public function shouldReturnExpectedShopDetails(): void
	{
		$expectedDetails = $this->shopDetails;
		$actualDetails   = $this->shopInformationRepository->getShopDetails();
		
		$this->assertEquals($expectedDetails, $actualDetails);
	}
	
	
	/**
	 * @test
	 */
	public function shouldReturnExpectedServerDetails(): void
	{
		$expectedDetails = $this->serverDetails;
		$actualDetails   = $this->shopInformationRepository->getServerDetails();
		
		$this->assertEquals($expectedDetails, $actualDetails);
	}
	
	
	/**
	 * @test
	 */
	public function shouldReturnExpectedModulesDetails(): void
	{
		$expectedDetails = $this->modulesDetails;
		$actualDetails   = $this->shopInformationRepository->getModulesDetails();
		
		$this->assertEquals($expectedDetails, $actualDetails);
	}
	
	
	/**
	 * @test
	 */
	public function shouldReturnExpectedTemplateDetails(): void
	{
		$expectedDetails = $this->templatesDetails;
		$actualDetails   = $this->shopInformationRepository->getTemplateDetails();
		
		$this->assertEquals($expectedDetails, $actualDetails);
	}
	
	
	/**
	 * @test
	 */
	public function shouldReturnExpectedFileSystemDetails(): void
	{
		$expectedDetails = $this->fileSystemDetails;
		$actualDetails   = $this->shopInformationRepository->getFileSystemDetails();
		
		$this->assertEquals($expectedDetails, $actualDetails);
	}
	
	
	/**
	 * @test
	 */
	public function shouldReturnExpectedUpdatesDetails(): void
	{
		$expectedDetails = $this->updatesDetails;
		$actualDetails   = $this->shopInformationRepository->getUpdatesDetails();
		
		$this->assertEquals($expectedDetails, $actualDetails);
	}
}