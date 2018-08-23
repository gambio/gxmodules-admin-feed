<?php
/* --------------------------------------------------------------
   RequestControl.php 2018-08-10
   Gambio GmbH
   http://www.gambio.de
   Copyright (c) 2018 Gambio GmbH
   Released under the GNU General Public License (Version 2)
   [http://www.gnu.org/licenses/gpl-2.0.html]
   --------------------------------------------------------------
*/

namespace Gambio\AdminFeed;

use Gambio\AdminFeed\Adapters\GxAdapterTrait;

/**
 * Class RequestControl
 *
 * @package Gambio\AdminFeed\Services\ShopInformation
 */
class RequestControl
{
	use GxAdapterTrait;
	
	/**
	 * @var string
	 */
	private $allowedIpsUrl = 'https://admin-feed.gambio-server.net/allowedIps.json';
	
	/**
	 * @var string
	 */
	private $tokenDataCacheKey = 'admin-feed-request-tokens';
	
	/**
	 * @var int
	 */
	private $tokenLifeSpan = 300; # 5 minutes
	
	
	/**
	 * @return string
	 */
	public function createRequestToken()
	{
		$this->deleteOldRequestTokens();
		
		$token     = uniqid();
		$dataCache = $this->gxAdapter()->getDataCache();
		$dataCache->add_data($this->tokenDataCacheKey, [
			[
				'timestamp' => time(),
				'token'     => $token,
			]
		], true);
		
		return $token;
	}
	
	
	/**
	 * @param string $token
	 *
	 * @return bool
	 */
	public function verifyRequestToken($token)
	{
		$availableTokens = $this->getRequestTokens();
		
		return in_array($token, $availableTokens);
	}
	
	
	/**
	 * @param string $ip
	 *
	 * @return bool
	 */
	public function verifyRequestIp($ip)
	{
		return true;
	}
	
	
	/**
	 * @return array
	 */
	private function getRequestTokens()
	{
		$this->deleteOldRequestTokens();
		
		$token      = [];
		$dataCache  = $this->gxAdapter()->getDataCache();
		$tokensData = $dataCache->get_data($this->tokenDataCacheKey, true);
		
		if(is_array($tokensData) && count($tokensData) > 0)
		{
			foreach($tokensData as $tokenData)
			{
				$token[] = $tokenData['token'];
			}
		}
		
		return $token;
	}
	
	
	/**
	 * @return void
	 */
	private function deleteOldRequestTokens()
	{
		$dataCache  = $this->gxAdapter()->getDataCache();
		$tokensData = $dataCache->get_data($this->tokenDataCacheKey, true);
		
		if(is_array($tokensData) && count($tokensData) > 0)
		{
			foreach($tokensData as $index => $tokenData)
			{
				if($tokenData['timestamp'] < time() - $this->tokenLifeSpan)
				{
					unset($tokensData[$index]);
				}
			}
		}
		
		$dataCache->set_data($this->tokenDataCacheKey, $tokensData, true);
	}
}