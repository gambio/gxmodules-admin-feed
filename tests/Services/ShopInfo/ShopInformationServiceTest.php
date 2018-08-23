<?php
/* --------------------------------------------------------------
   ShopInformationServiceTest.inc.php 2018-08-01
   Gambio GmbH
   http://www.gambio.de
   Copyright (c) 2018 Gambio GmbH
   Released under the GNU General Public License (Version 2)
   [http://www.gnu.org/licenses/gpl-2.0.html]
   --------------------------------------------------------------
*/

use Gambio\AdminFeed\Services\ShopInformation\Entities\ShopInformation;
use Gambio\AdminFeed\Services\ShopInformation\Repositories\ShopInformationRepository;
use Gambio\AdminFeed\Services\ShopInformation\Repositories\TokenRepository;
use Gambio\AdminFeed\Services\ShopInformation\ShopInformationService;
use Gambio\AdminFeed\Services\ShopInformation\ValueObjects\FileSystemDetails;
use Gambio\AdminFeed\Services\ShopInformation\ValueObjects\MerchantDetails;
use Gambio\AdminFeed\Services\ShopInformation\ValueObjects\ModulesDetails;
use Gambio\AdminFeed\Services\ShopInformation\ValueObjects\ServerDetails;
use Gambio\AdminFeed\Services\ShopInformation\ValueObjects\ShopDetails;
use Gambio\AdminFeed\Services\ShopInformation\ValueObjects\TemplateDetails;
use Gambio\AdminFeed\Services\ShopInformation\ValueObjects\UpdatesDetails;
use PHPUnit\Framework\TestCase;

/**
 * Class ShopInformationServiceTest
 */
class ShopInformationServiceTest extends TestCase
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
	 * @var \Gambio\AdminFeed\Services\ShopInformation\ValueObjects\TemplateDetails
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
	 * @var \Gambio\AdminFeed\Services\ShopInformation\Repositories\TokenRepository|\PHPUnit\Framework\MockObject\MockObject
	 */
	private $tokenRepository;
	
	/**
	 * @var \Gambio\AdminFeed\Services\ShopInformation\ShopInformationService
	 */
	private $service;
	
	
	public function setUp()
	{
		$this->shopInformationRepository = $this->createMock(ShopInformationRepository::class);
		$this->tokenRepository           = $this->createMock(TokenRepository::class);
		
		$this->shopDetails = $this->createMock(ShopDetails::class);
		$this->shopInformationRepository->method('getShopDetails')->willReturn($this->shopDetails);
		
		$this->serverDetails = $this->createMock(ServerDetails::class);
		$this->shopInformationRepository->method('getServerDetails')->willReturn($this->serverDetails);
		
		$this->modulesDetails = $this->createMock(ModulesDetails::class);
		$this->shopInformationRepository->method('getModulesDetails')->willReturn($this->modulesDetails);
		
		$this->templatesDetails = $this->createMock(TemplateDetails::class);
		$this->shopInformationRepository->method('getTemplateDetails')->willReturn($this->templatesDetails);
		
		$this->fileSystemDetails = $this->createMock(FileSystemDetails::class);
		$this->shopInformationRepository->method('getFileSystemDetails')->willReturn($this->fileSystemDetails);
		
		$this->merchantDetails = $this->createMock(MerchantDetails::class);
		$this->shopInformationRepository->method('getMerchantDetails')->willReturn($this->merchantDetails);
		
		$this->updatesDetails = $this->createMock(UpdatesDetails::class);
		$this->shopInformationRepository->method('getUpdatesDetails')->willReturn($this->updatesDetails);
		
		$this->shopInformation = ShopInformation::create($this->shopDetails, $this->serverDetails,
		                                                 $this->modulesDetails, $this->templatesDetails,
		                                                 $this->fileSystemDetails, $this->merchantDetails,
		                                                 $this->updatesDetails);
		
		$this->service = new ShopInformationService($this->shopInformationRepository, $this->tokenRepository);
	}
	
	
	/**
	 * @test
	 */
	public function shouldAlwaysReturnDifferentTokens()
	{
		$this->assertNotSame($this->service->createRequestToken(), $this->service->createRequestToken());
	}
	
	
	/**
	 * @test
	 */
	public function shouldAddNewTokenByUsingRepository()
	{
		$this->tokenRepository->expects($this->once())->method('addToken');
		
		$this->service->createRequestToken();
	}
	
	
	/**
	 * @test
	 */
	public function shouldVerifyGivenRequestTokenByUsingRepository()
	{
		$token = uniqid();
		
		$this->tokenRepository->expects($this->once())->method('verifyToken')->with($token);
		
		$this->service->verifyRequestToken($token);
	}
	
	
	/**
	 * @test
	 */
	public function shouldReturnExpectedShopInformation()
	{
		$expectedDetails = $this->shopInformation;
		$actualDetails   = $this->service->getShopInformation();
		
		$this->assertEquals($expectedDetails, $actualDetails);
	}
	
	
	/**
	 * @test
	 */
	public function shouldReturnExpectedShopDetails()
	{
		$expectedDetails = $this->shopDetails;
		$actualDetails   = $this->service->getShopDetails();
		
		$this->assertEquals($expectedDetails, $actualDetails);
	}
	
	
	/**
	 * @test
	 */
	public function shouldReturnExpectedServerDetails()
	{
		$expectedDetails = $this->serverDetails;
		$actualDetails   = $this->service->getServerDetails();
		
		$this->assertEquals($expectedDetails, $actualDetails);
	}
	
	
	/**
	 * @test
	 */
	public function shouldReturnExpectedModulesDetails()
	{
		$expectedDetails = $this->modulesDetails;
		$actualDetails   = $this->service->getModulesDetails();
		
		$this->assertEquals($expectedDetails, $actualDetails);
	}
	
	
	/**
	 * @test
	 */
	public function shouldReturnExpectedTemplateDetails()
	{
		$expectedDetails = $this->templatesDetails;
		$actualDetails   = $this->service->getTemplateDetails();
		
		$this->assertEquals($expectedDetails, $actualDetails);
	}
	
	
	/**
	 * @test
	 */
	public function shouldReturnExpectedFileSystemDetails()
	{
		$expectedDetails = $this->fileSystemDetails;
		$actualDetails   = $this->service->getFileSystemDetails();
		
		$this->assertEquals($expectedDetails, $actualDetails);
	}
	
	
	/**
	 * @test
	 */
	public function shouldReturnExpectedMerchantDetails()
	{
		$expectedDetails = $this->merchantDetails;
		$actualDetails   = $this->service->getMerchantDetails();
		
		$this->assertEquals($expectedDetails, $actualDetails);
	}
	
	
	/**
	 * @test
	 */
	public function shouldReturnExpectedUpdatesDetails()
	{
		$expectedDetails = $this->updatesDetails;
		$actualDetails   = $this->service->getUpdatesDetails();
		
		$this->assertEquals($expectedDetails, $actualDetails);
	}
}