<?php
/* --------------------------------------------------------------
   UpdateDetails.php 2018-08-01
   Gambio GmbH
   http://www.gambio.de
   Copyright (c) 2018 Gambio GmbH
   Released under the GNU General Public License (Version 2)
   [http://www.gnu.org/licenses/gpl-2.0.html]
   --------------------------------------------------------------
*/

namespace Gambio\AdminFeed\Services\ShopInformation\ValueObjects;

/**
 * Class UpdateDetails
 *
 * @package Gambio\AdminFeed\Services\ShopInformation\ValueObjects
 */
class UpdateDetails
{
	/**
	 * @var string
	 */
	private $name;
	
	/**
	 * @var string
	 */
	private $version;
	
	
	/**
	 * @param string $name
	 * @param string $version
	 */
	public function __construct($name, $version)
	{
		$this->name    = $name;
		$this->version = $version;
	}
	
	
	/**
	 * @param string $name
	 * @param string $version
	 *
	 * @return self
	 */
	static function create($name, $version)
	{
		return new self($name, $version);
	}
	
	
	/**
	 * @return string
	 */
	public function name()
	{
		return $this->name;
	}
	
	
	/**
	 * @return string
	 */
	public function version()
	{
		return $this->version;
	}
}