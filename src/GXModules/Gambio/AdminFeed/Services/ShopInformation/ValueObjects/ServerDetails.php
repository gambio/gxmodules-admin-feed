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
	 * @var string
	 */
	private $webserver;
	
	/**
	 * @var string
	 */
	private $os;
	
	
	/**
	 * ServerDetails constructor.
	 *
	 * @param \Gambio\AdminFeed\Services\ShopInformation\ValueObjects\PhpServerDetails   $php
	 * @param \Gambio\AdminFeed\Services\ShopInformation\ValueObjects\MysqlServerDetails $mysql
	 * @param string                                                                     $webserver
	 * @param string                                                                     $os
	 */
	public function __construct(PhpServerDetails $php, MysqlServerDetails $mysql, $webserver, $os)
	{
		$this->php       = $php;
		$this->mysql     = $mysql;
		$this->webserver = $webserver;
		$this->os        = $os;
	}
	
	
	/**
	 * Creates and returns a new ServerDetails instance.
	 *
	 * @param \Gambio\AdminFeed\Services\ShopInformation\ValueObjects\PhpServerDetails   $php
	 * @param \Gambio\AdminFeed\Services\ShopInformation\ValueObjects\MysqlServerDetails $mysql
	 * @param string                                                                     $webserver
	 * @param string                                                                     $os
	 *
	 * @return \Gambio\AdminFeed\Services\ShopInformation\ValueObjects\ServerDetails
	 */
	static function create(PhpServerDetails $php, MysqlServerDetails $mysql, $webserver, $os)
	{
		return new self($php, $mysql, $webserver, $os);
	}
	
	
	/**
	 * Returns the php details.
	 *
	 * @return \Gambio\AdminFeed\Services\ShopInformation\ValueObjects\PhpServerDetails
	 */
	public function php()
	{
		return $this->php;
	}
	
	
	/**
	 * Returns the mysql details.
	 *
	 * @return \Gambio\AdminFeed\Services\ShopInformation\ValueObjects\MysqlServerDetails
	 */
	public function mysql()
	{
		return $this->mysql;
	}
	
	
	/**
	 * Returns the software name that is used for the web server.
	 *
	 * @return string
	 */
	public function webserver()
	{
		return $this->webserver;
	}
	
	
	/**
	 * Returns the name of the operating system.
	 *
	 * @return string
	 */
	public function os()
	{
		return $this->os;
	}
}