<?php
/* --------------------------------------------------------------
   ServerDetailsMapper.php 2018-08-01
   Gambio GmbH
   http://www.gambio.de
   Copyright (c) 2018 Gambio GmbH
   Released under the GNU General Public License (Version 2)
   [http://www.gnu.org/licenses/gpl-2.0.html]
   --------------------------------------------------------------
*/

namespace Gambio\AdminFeed\Services\ShopInformation\Mapper;

use Gambio\AdminFeed\Services\ShopInformation\Reader\ServerDetailsReader;
use Gambio\AdminFeed\Services\ShopInformation\ValueObjects\MysqlServerDetails;
use Gambio\AdminFeed\Services\ShopInformation\ValueObjects\PhpServerDetails;
use Gambio\AdminFeed\Services\ShopInformation\ValueObjects\ServerDetails;

/**
 * Class ServerDetailsMapper
 *
 * @package Gambio\AdminFeed\Services\ShopInformation\Mapper
 */
class ServerDetailsMapper
{
	/**
	 * @var \Gambio\AdminFeed\Services\ShopInformation\Reader\ServerDetailsReader
	 */
	private $reader;
	
	
	/**
	 * ServerDetailsMapper constructor.
	 *
	 * @param \Gambio\AdminFeed\Services\ShopInformation\Reader\ServerDetailsReader $reader
	 */
	public function __construct(ServerDetailsReader $reader)
	{
		$this->reader = $reader;
	}
	
	
	/**
	 * @return \Gambio\AdminFeed\Services\ShopInformation\ValueObjects\ServerDetails
	 */
	public function getServerDetails()
	{
		$phpDetails   = new PhpServerDetails($this->reader->getPhpVersion(), $this->reader->getPhpExtensions(),
		                                     $this->reader->getPhpConfiguration());
		$mysqlDetails = new MysqlServerDetails($this->reader->getMysqlVersion(), $this->reader->getMysqlEngines(),
		                                       $this->reader->getMysqlDefaultEngine());
		$webserver    = $this->reader->getWebserver();
		$os           = $this->reader->getOperatingSystem();
		
		return new ServerDetails($phpDetails, $mysqlDetails, $webserver, $os);
	}
}