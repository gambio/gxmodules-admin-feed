<?php
/* --------------------------------------------------------------
   ServerDetails.php 2018-08-01
   Gambio GmbH
   http://www.gambio.de
   Copyright (c) 2018 Gambio GmbH
   Released under the GNU General Public License (Version 2)
   [http://www.gnu.org/licenses/gpl-2.0.html]
   --------------------------------------------------------------
*/

namespace Gambio\AdminFeed\Services\ShopInformation\ValueObjects;

/**
 * Class ServerDetails
 *
 * @package Gambio\AdminFeed\Services\ShopInformation\ValueObjects
 */
class ServerDetails
{
	/**
	 * @var \Gambio\AdminFeed\Services\ShopInformation\ValueObjects\PhpServerDetails
	 */
	private $php;
	
	/**
	 * @var \Gambio\AdminFeed\Services\ShopInformation\ValueObjects\MysqlServerDetails
	 */
	private $mysql;
	
	
	/**
	 * @param \Gambio\AdminFeed\Services\ShopInformation\ValueObjects\PhpServerDetails   $php
	 * @param \Gambio\AdminFeed\Services\ShopInformation\ValueObjects\MysqlServerDetails $mysql
	 */
	public function __construct(PhpServerDetails $php, MysqlServerDetails $mysql)
	{
		$this->php   = $php;
		$this->mysql = $mysql;
	}
	
	
	/**
	 * @param \Gambio\AdminFeed\Services\ShopInformation\ValueObjects\PhpServerDetails   $php
	 * @param \Gambio\AdminFeed\Services\ShopInformation\ValueObjects\MysqlServerDetails $mysql
	 *
	 * @return self
	 */
	static function create(PhpServerDetails $php, MysqlServerDetails $mysql)
	{
		return new self($php, $mysql);
	}
	
	
	/**
	 * @return \Gambio\AdminFeed\Services\ShopInformation\ValueObjects\PhpServerDetails
	 */
	public function php()
	{
		return $this->php;
	}
	
	
	/**
	 * @return \Gambio\AdminFeed\Services\ShopInformation\ValueObjects\MysqlServerDetails
	 */
	public function mysql()
	{
		return $this->mysql;
	}
	
}