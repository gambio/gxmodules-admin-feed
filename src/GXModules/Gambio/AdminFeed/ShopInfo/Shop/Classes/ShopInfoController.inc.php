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

use Gambio\AdminFeed\CurlClient;
use Gambio\AdminFeed\RequestControl;
use Gambio\AdminFeed\Services\ShopInformation\Serializer\ShopInformationSerializer;
use Gambio\AdminFeed\Services\ShopInformation\ShopInformationFactory;

/**
 * Class ShopInfoController
 */
final class ShopInfoController extends HttpViewController
{
	/**
	 * @var \Gambio\AdminFeed\Services\ShopInformation\ShopInformationService
	 */
	private $shopInfoService;
	
	/**
	 * @var \Gambio\AdminFeed\RequestControl
	 */
	private $requestControl;
	
	
	public function __construct(\HttpContextReaderInterface $httpContextReader,
	                            \HttpResponseProcessorInterface $httpResponseProcessor,
	                            \ContentViewInterface $defaultContentView)
	{
		parent::__construct($httpContextReader, $httpResponseProcessor, $defaultContentView);
		
		$shopInfoServiceFactory = new ShopInformationFactory();
		$this->shopInfoService  = $shopInfoServiceFactory->createService();
		
		$this->requestControl = new RequestControl(new CurlClient());
	}
	
	
	public function actionDefault()
	{
		if($this->_verifyIp() === false)
		{
			http_response_code(403);
			
			return new HttpControllerResponse('Invalid ip!', ['Content-Type: text/json; charset=utf-8']);
		}
		elseif($this->_verifyToken() === false)
		{
			http_response_code(403);
			
			return new HttpControllerResponse('Invalid token!', ['Content-Type: text/json; charset=utf-8']);
		}
		
		$shopInformation = $this->shopInfoService->getShopInformation();
		$jsonOption      = $this->_getQueryParameter('pretty') !== null ? JSON_PRETTY_PRINT : 0;
		$httpHeader      = ['Content-Type: text/json; charset=utf-8'];
		
		return new HttpControllerResponse(json_encode(ShopInformationSerializer::serialize($shopInformation),
		                                              $jsonOption), $httpHeader);
	}
	
	
	private function _verifyIp()
	{
		$ip = isset($_SERVER['HTTP_X_FORWARDED_FOR']) ? $_SERVER['HTTP_X_FORWARDED_FOR'] : $_SERVER['REMOTE_ADDR'];
		
		if($this->requestControl->verifyRequestIp($ip))
		{
			return true;
		}
		
		return false;
	}
	
	
	private function _verifyToken()
	{
		$token = $this->_getQueryParameter('token');
		
		if($token !== null && $this->requestControl->verifyRequestToken($token))
		{
			return true;
		}
		
		return false;
	}
}