<?php
/* --------------------------------------------------------------
   ShopInformationTest.inc.php 2018-08-01
   Gambio GmbH
   http://www.gambio.de
   Copyright (c) 2018 Gambio GmbH
   Released under the GNU General Public License (Version 2)
   [http://www.gnu.org/licenses/gpl-2.0.html]
   --------------------------------------------------------------
*/

use Gambio\AdminFeed\Services\ShopInformation\Entities\ShopInformation;
use Gambio\AdminFeed\Services\ShopInformation\ValueObjects\FileSystemDetails;
use Gambio\AdminFeed\Services\ShopInformation\ValueObjects\MerchantDetails;
use Gambio\AdminFeed\Services\ShopInformation\ValueObjects\ModulesDetails;
use Gambio\AdminFeed\Services\ShopInformation\ValueObjects\ServerDetails;
use Gambio\AdminFeed\Services\ShopInformation\ValueObjects\ShopDetails;
use Gambio\AdminFeed\Services\ShopInformation\ValueObjects\TemplateDetails;
use Gambio\AdminFeed\Services\ShopInformation\ValueObjects\UpdatesDetails;
use PHPUnit\Framework\TestCase;

/**
 * Class ShopInformationTest
 */
class ShopInformationTest extends TestCase
{
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
	 * @var \Gambio\AdminFeed\Services\ShopInformation\ValueObjects\UpdatesDetails
	 */
	private $updatesDetails;
	
	
	/**
	 * @var \Gambio\AdminFeed\Services\ShopInformation\Entities\ShopInformation
	 */
	private $shopInformation;
	
	
	public function setUp()
	{
		$this->shopDetails       = $this->createMock(ShopDetails::class);
		$this->serverDetails     = $this->createMock(ServerDetails::class);
		$this->modulesDetails    = $this->createMock(ModulesDetails::class);
		$this->templatesDetails  = $this->createMock(TemplateDetails::class);
		$this->fileSystemDetails = $this->createMock(FileSystemDetails::class);
		$this->updatesDetails    = $this->createMock(UpdatesDetails::class);
		
		$this->shopInformation = ShopInformation::create($this->shopDetails, $this->serverDetails,
		                                                 $this->modulesDetails, $this->templatesDetails,
		                                                 $this->fileSystemDetails, $this->updatesDetails);
	}
	
	
	/**
	 * @test
	 */
	public function shouldReturnExpectedShopDetails()
	{
		$expectedDetails = $this->shopDetails;
		$actualDetails   = $this->shopInformation->shop();
		
		$this->assertEquals($expectedDetails, $actualDetails);
	}
	
	
	/**
	 * @test
	 */
	public function shouldReturnExpectedServerDetails()
	{
		$expectedDetails = $this->serverDetails;
		$actualDetails   = $this->shopInformation->server();
		
		$this->assertEquals($expectedDetails, $actualDetails);
	}
	
	
	/**
	 * @test
	 */
	public function shouldReturnExpectedModulesDetails()
	{
		$expectedDetails = $this->modulesDetails;
		$actualDetails   = $this->shopInformation->modules();
		
		$this->assertEquals($expectedDetails, $actualDetails);
	}
	
	
	/**
	 * @test
	 */
	public function shouldReturnExpectedTemplateDetails()
	{
		$expectedDetails = $this->templatesDetails;
		$actualDetails   = $this->shopInformation->templates();
		
		$this->assertEquals($expectedDetails, $actualDetails);
	}
	
	
	/**
	 * @test
	 */
	public function shouldReturnExpectedFileSystemDetails()
	{
		$expectedDetails = $this->fileSystemDetails;
		$actualDetails   = $this->shopInformation->filesystem();
		
		$this->assertEquals($expectedDetails, $actualDetails);
	}
	
	
	/**
	 * @test
	 */
	public function shouldReturnExpectedUpdatesDetails()
	{
		$expectedDetails = $this->updatesDetails;
		$actualDetails   = $this->shopInformation->updates();
		
		$this->assertEquals($expectedDetails, $actualDetails);
	}
}