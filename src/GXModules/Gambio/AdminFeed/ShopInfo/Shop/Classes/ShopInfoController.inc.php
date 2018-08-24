<?php
/* --------------------------------------------------------------
   ShopInfoController.inc.php 2018-07-26
   Gambio GmbH
   http://www.gambio.de
   Copyright (c) 2018 Gambio GmbH
   Released under the GNU General Public License (Version 2)
   [http://www.gnu.org/licenses/gpl-2.0.html]
   --------------------------------------------------------------
*/

use Gambio\AdminFeed\Services\ShopInformation\ShopInformationServiceFactory;

/**
 * Class ShopInfoController
 */
class ShopInfoController extends HttpViewController
{
	/**
	 * @var \Gambio\AdminFeed\Services\ShopInformation\ShopInformationService
	 */
	protected $shopInfoService;
	
	
	public function __construct(\HttpContextReaderInterface $httpContextReader,
	                            \HttpResponseProcessorInterface $httpResponseProcessor,
	                            \ContentViewInterface $defaultContentView)
	{
		parent::__construct($httpContextReader, $httpResponseProcessor, $defaultContentView);
		
		$shopInfoServiceFactory = new ShopInformationFactory();
		$this->shopInfoService  = $shopInfoServiceFactory->createService();
	}
	
	
	public function actionDefault()
	{
		$shopInformation = $this->shopInfoService->getShopInformation();
		return new HttpControllerResponse(serialize($shopInformation));
	}
}