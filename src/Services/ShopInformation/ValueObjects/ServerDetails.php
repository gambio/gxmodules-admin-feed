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

use Gambio\AdminFeed\Services\ShopInformation\ValueObjects\Interfaces\MysqlServerDetailsInterface;
use Gambio\AdminFeed\Services\ShopInformation\ValueObjects\Interfaces\PhpServerDetailsInterface;
use Gambio\AdminFeed\Services\ShopInformation\ValueObjects\Interfaces\ServerDetailsInterface;

/**
 * Class ServerDetails
 *
 * @package Gambio\AdminFeed\Services\ShopInformation\ValueObjects
 */
class ServerDetails implements ServerDetailsInterface
{
	/**
	 * @var \Gambio\AdminFeed\Services\ShopInformation\ValueObjects\Interfaces\PhpServerDetailsInterface
	 */
	private $php;
	
	/**
	 * @var \Gambio\AdminFeed\Services\ShopInformation\ValueObjects\Interfaces\MysqlServerDetailsInterface
	 */
	private $mysql;
	
	
	/**
	 * @param \Gambio\AdminFeed\Services\ShopInformation\ValueObjects\Interfaces\PhpServerDetailsInterface   $php
	 * @param \Gambio\AdminFeed\Services\ShopInformation\ValueObjects\Interfaces\MysqlServerDetailsInterface $mysql
	 */
	public function __construct(PhpServerDetailsInterface $php, MysqlServerDetailsInterface $mysql)
	{
		$this->php   = $php;
		$this->mysql = $mysql;
	}
	
	
	/**
	 * @param \Gambio\AdminFeed\Services\ShopInformation\ValueObjects\Interfaces\PhpServerDetailsInterface   $php
	 * @param \Gambio\AdminFeed\Services\ShopInformation\ValueObjects\Interfaces\MysqlServerDetailsInterface $mysql
	 *
	 * @return self
	 */
	static function create(PhpServerDetailsInterface $php, MysqlServerDetailsInterface $mysql)
	{
		return new self($php, $mysql);
	}
	
	
	/**
	 * @return \Gambio\AdminFeed\Services\ShopInformation\ValueObjects\Interfaces\PhpServerDetailsInterface
	 */
	public function php()
	{
		return $this->php;
	}
	
	
	/**
	 * @return \Gambio\AdminFeed\Services\ShopInformation\ValueObjects\Interfaces\MysqlServerDetailsInterface
	 */
	public function mysql()
	{
		return $this->mysql;
	}
	
}