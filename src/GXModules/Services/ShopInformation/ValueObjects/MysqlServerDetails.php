<?php
/* --------------------------------------------------------------
   MysqlServerDetails.php 2018-08-01
   Gambio GmbH
   http://www.gambio.de
   Copyright (c) 2018 Gambio GmbH
   Released under the GNU General Public License (Version 2)
   [http://www.gnu.org/licenses/gpl-2.0.html]
   --------------------------------------------------------------
*/

namespace Gambio\AdminFeed\Services\ShopInformation\ValueObjects;

use Gambio\AdminFeed\Services\ShopInformation\ValueObjects\Interfaces\MysqlServerDetailsInterface;

/**
 * Class MysqlServerDetails
 *
 * @package Gambio\AdminFeed\Services\ShopInformation\ValueObjects
 */
class MysqlServerDetails implements MysqlServerDetailsInterface
{
	/**
	 * @var string
	 */
	private $version;
	
	/**
	 * @var array
	 */
	private $engines;
	
	
	/**
	 * @param string $version
	 */
	public function __construct($version)
	{
		$this->version = $version;
	}
	
	
	/**
	 * @param string $version
	 *
	 * @return self
	 */
	static function create($version)
	{
		return new self($version);
	}
	
	
	/**
	 * @return string
	 */
	public function version()
	{
		return $this->version;
	}
	
}