<?php
/* --------------------------------------------------------------
   UpdateDetailsReader.php 2018-08-01
   Gambio GmbH
   http://www.gambio.de
   Copyright (c) 2018 Gambio GmbH
   Released under the GNU General Public License (Version 2)
   [http://www.gnu.org/licenses/gpl-2.0.html]
   --------------------------------------------------------------
*/

namespace Gambio\AdminFeed\Services\ShopInformation\Reader;

/**
 * Class UpdateDetailsReader
 *
 * @package Gambio\AdminFeed\Services\ShopInformation\Reader
 */
class UpdateDetailsReader
{
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
	 * @param \CI_DB_query_builder $db
	 *
	 * @return self
	 */
	static function create(\CI_DB_query_builder $db)
	{
		return new self($db);
	}
	
	
	/**
	 * @return array
	 */
	public function getUpdates()
	{
		$updates = $this->db->select('*')
		                    ->from('version_history')
		                    ->order_by('history_id', 'DESC')
		                    ->get()
		                    ->result_array();
		
		return $updates;
	}
}