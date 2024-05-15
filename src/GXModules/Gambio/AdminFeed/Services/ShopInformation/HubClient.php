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
use Gambio\AdminFeed\CurlClient;

/**
 * Class HubClient
 *
 * @package Gambio\AdminFeed\Services\ShopInformation
 */
class HubClient
{
	/**
	 * HubClient constructor.
	 *
	 * @param \Gambio\AdminFeed\Services\ShopInformation\Settings $settings
	 * @param \Gambio\AdminFeed\Adapters\GxAdapter                $gxAdapter
	 * @param \Gambio\AdminFeed\CurlClient                        $curl
	 */
	public function __construct(private readonly Settings $settings, private readonly GxAdapter $gxAdapter, private readonly CurlClient $curl)
 {
 }
	
	
	/**
	 * Returns the hub modules data.
	 *
	 * @return array
	 */
	public function getHubModulesData()
	{
		try
		{
			$hubClientKey = $this->settings->getHubClientKey();
			if(empty($hubClientKey))
			{
				return [];
			}
			
			$hubSessionKey = $this->startHubSession();
			if(empty($hubSessionKey))
			{
				return [];
			}
			
			$url = $this->settings->getGambioHubConfigUrl() . '/clients/' . $hubClientKey . '/sessions/'
			       . $hubSessionKey . '/payment_modules?language=en';
			$this->curl->executeGet($url);
			
			if($this->curl->getStatusCode() !== 200)
			{
				return [];
			}
			$modulesData = json_decode((string) $this->curl->getContent(), true);
		}
		catch(\Exception)
		{
			return [];
		}
		
		return $modulesData;
	}
	
	
	/**
	 * @return string
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
		catch(\UnexpectedValueException|\HubPublic\Exceptions\CurlRequestException)
		{
			\AuthHashCreator::invalidate($authHash);
		}
		
		return '';
	}
}