<?php
/* --------------------------------------------------------------
   TokenReader.php 2018-08-01
   Gambio GmbH
   http://www.gambio.de
   Copyright (c) 2018 Gambio GmbH
   Released under the GNU General Public License (Version 2)
   [http://www.gnu.org/licenses/gpl-2.0.html]
   --------------------------------------------------------------
*/

namespace Gambio\AdminFeed\Services\ShopInformation\Reader;

use Gambio\AdminFeed\Adapters\GxAdapterTrait;
use Gambio\AdminFeed\Services\ShopInformation\Settings;

/**
 * Class TokenReader
 *
 * @package Gambio\AdminFeed\Services\ShopInformation\Reader
 */
class TokenReader
{
	use GxAdapterTrait;
	
	/**
	 * @var \Gambio\AdminFeed\Services\ShopInformation\Settings
	 */
	private $settings;
	
	
	/**
	 * TokenReader constructor.
	 *
	 * @param \Gambio\AdminFeed\Services\ShopInformation\Settings $settings
	 */
	public function __construct(Settings $settings)
	{
		$this->settings = $settings;
	}
	
	
	/**
	 * @return array
	 */
	public function getTokensData()
	{
		$dataCache = $this->gxAdapter()->getDataCache();
		
		return $dataCache->get_data($this->settings->getTokenDataCacheKey(), true);
	}
}