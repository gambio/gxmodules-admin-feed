<?php
/* --------------------------------------------------------------
   UpdatesDetailsReader.php 2018-08-01
   Gambio GmbH
   http://www.gambio.de
   Copyright (c) 2018 Gambio GmbH
   Released under the GNU General Public License (Version 2)
   [http://www.gnu.org/licenses/gpl-2.0.html]
   --------------------------------------------------------------
*/

namespace Gambio\AdminFeed\Services\ShopInformation\Reader;

use Gambio\AdminFeed\Adapters\GxAdapterTrait;

/**
 * Class UpdatesDetailsReader
 *
 * @package Gambio\AdminFeed\Services\ShopInformation\Reader
 */
class UpdatesDetailsReader
{
	use GxAdapterTrait;
	
	/**
	 * @var \CI_DB_query_builder
	 */
	private $db;
	
	
	/**
	 * @param \CI_DB_query_builder $db
	 *
	 * @return self
	 */
	public function __construct(\CI_DB_query_builder $db)
	{
		$this->db = $db;
	}
	
	
	/**
	 * @return array
	 */
	public function getInstalledUpdatesData()
	{
		$updates = $this->db->select('*')
		                    ->from('version_history')
		                    ->order_by('history_id', 'DESC')
		                    ->get()
		                    ->result_array();
		
		return $updates;
	}
	
	
	/**
	 * @return array
	 */
	public function getDownloadedUpdatesData()
	{
		$gxAdapter = $this->gxAdapter();
		$dataCache = $gxAdapter->getDataCache();
		
		if($dataCache->key_exists('auto-updater', true))
		{
			return $dataCache->get_data('auto-updater', true);
		}
		
		return [];
	}
}