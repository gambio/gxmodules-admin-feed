<?php
/* --------------------------------------------------------------
   HubClient.php 2018-08-10
   Gambio GmbH
   http://www.gambio.de
   Copyright (c) 2018 Gambio GmbH
   Released under the GNU General Public License (Version 2)
   [http://www.gnu.org/licenses/gpl-2.0.html]
   --------------------------------------------------------------
*/

namespace Gambio\AdminFeed\Services\ShopInformation;

use Gambio\AdminFeed\Adapters\GxAdapter;
use GuzzleHttp\Client as CurlClient;

/**
 * Class HubClient
 *
 * @package Gambio\AdminFeed\Services\ShopInformation
 */
class HubClient
{
	/**
	 * @var \Gambio\AdminFeed\Services\ShopInformation\Settings
	 */
	private $settings;
	
	/**
	 * @var \Gambio\AdminFeed\Adapters\GxAdapter
	 */
	private $gxAdapter;
	
	/**
	 * @var \GuzzleHttp\Client
	 */
	private $curl;
	
	
	/**
	 * HubClient constructor.
	 *
	 * @param \Gambio\AdminFeed\Services\ShopInformation\Settings $settings
	 * @param \Gambio\AdminFeed\Adapters\GxAdapter                $gxAdapter
	 */
	public function __construct(Settings $settings, GxAdapter $gxAdapter, CurlClient $curl)
	{
		$this->settings  = $settings;
		$this->gxAdapter = $gxAdapter;
		$this->curl      = $curl;
	}
	
	
	/**
	 * @return array
	 */
	public function getHubModulesData()
	{
		try
		{
			$hubClientKey  = $this->settings->getHubClientKey();
			$hubSessionKey = $this->startHubSession();
			
			$url      = $this->settings->getGambioHubConfigUrl() . '/clients/' . $hubClientKey . '/sessions/'
			            . $hubSessionKey . '/payment_modules?language=en';
			$options  = [
				'timeout' => $this->settings->getGambioHubCurlTimeout()
			];
			$response = $this->curl->request('GET', $url, $options);
			
			if($response->getStatusCode() !== 200)
			{
				return [];
			}
			$modulesData = json_decode($response->getBody()->getContents(), true);
		}
		catch(\Exception $e)
		{
			return [];
		}
		catch(\GuzzleHttp\Exception\GuzzleException $e)
		{
			return [];
		}
		
		return $modulesData;
	}
	
	
	/**
	 * @return string
	 *
	 * @throws \Exception If session key could not be created.
	 */
	private function startHubSession()
	{
		$languageCode              = $this->gxAdapter->getCurrentLanguageCode();
		$hubServiceFactory         = $this->gxAdapter->mainFactoryCreate('HubServiceFactory');
		$hubSessionKeyService      = $hubServiceFactory->createHubSessionKeyService();
		$hubClientKeyConfiguration = $this->gxAdapter->mainFactoryCreate('HubClientKeyConfiguration');
		$curlRequest               = $this->gxAdapter->getHubCurlRequest();
		$logControl                = $this->gxAdapter->getLogControl();
		$hubSettings               = $this->gxAdapter->mainFactoryCreate('HubSettings',
		                                                                 $this->settings->getGambioHubCurlTimeout());
		
		/** @var \HubSessionsApiClient $hubSessionsApiClient */
		$hubSessionsApiClient = $this->gxAdapter->mainFactoryCreate('HubSessionsApiClient',
		                                                            $this->settings->getGambioHubUrl(),
		                                                            $hubSessionKeyService, $hubClientKeyConfiguration,
		                                                            $curlRequest, $logControl, $hubSettings);
		
		$authHash = \AuthHashCreator::create();
		
		try
		{
			return $hubSessionsApiClient->startSession($authHash, $this->settings->getHttpServer()
			                                                      . $this->settings->getShopDirectory(), $languageCode);
		}
		catch(\UnexpectedValueException $e)
		{
			\AuthHashCreator::invalidate($authHash);
		}
		catch(\HubPublic\Exceptions\CurlRequestException $e)
		{
			\AuthHashCreator::invalidate($authHash);
		}
		
		throw new \Exception('Could not create hub session key.');
	}
}