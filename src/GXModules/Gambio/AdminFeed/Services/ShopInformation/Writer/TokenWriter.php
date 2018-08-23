<?php
/* --------------------------------------------------------------
   TokenWriter.php 2018-08-01
   Gambio GmbH
   http://www.gambio.de
   Copyright (c) 2018 Gambio GmbH
   Released under the GNU General Public License (Version 2)
   [http://www.gnu.org/licenses/gpl-2.0.html]
   --------------------------------------------------------------
*/

namespace Gambio\AdminFeed\Services\ShopInformation\Writer;

use Gambio\AdminFeed\Adapters\GxAdapterTrait;
use Gambio\AdminFeed\Services\ShopInformation\Settings;

/**
 * Class TokenWriter
 *
 * @package Gambio\AdminFeed\Services\ShopInformation\Writer
 */
class TokenWriter
{
	use GxAdapterTrait;
	
	/**
	 * @var \Gambio\AdminFeed\Services\ShopInformation\Settings
	 */
	private $settings;
	
	
	/**
	 * TokenWriter constructor.
	 *
	 * @param \Gambio\AdminFeed\Services\ShopInformation\Settings $settings
	 */
	public function __construct(Settings $settings)
	{
		$this->settings = $settings;
	}
	
	
	/**
	 * @param $token
	 *
	 * @return void
	 */
	public function addToken($token)
	{
		$dataCache = $this->gxAdapter()->getDataCache();
		$dataCache->add_data($this->settings->getTokenDataCacheKey(), [
			[
				'timestamp' => time(),
				'token'     => $token,
			]
		], true);
	}
	
	
	/**
	 * @return void
	 */
	public function deleteOldTokens()
	{
		$dataCache  = $this->gxAdapter()->getDataCache();
		$tokensData = $dataCache->get_data($this->settings->getTokenDataCacheKey(), true);
		
		if(is_array($tokensData) && count($tokensData) > 0)
		{
			foreach($tokensData as $index => $tokenData)
			{
				if($tokenData['timestamp'] < time() - $this->settings->getTokensLifespan())
				{
					unset($tokensData[$index]);
				}
			}
		}
		
		$dataCache->set_data($this->settings->getTokenDataCacheKey(), $tokensData, true);
	}
}