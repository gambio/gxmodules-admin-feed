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
	 * @var string
	 */
	private $installationDate;
	
	
	/**
	 * @param string $name
	 * @param string $version
	 * @param string $installationDate
	 */
	public function __construct($name, $version, $installationDate)
	{
		$this->name             = $name;
		$this->version          = $version;
		$this->installationDate = $installationDate;
	}
	
	
	/**
	 * @param string $name
	 * @param string $version
	 * @param string $installationDate
	 *
	 * @return self
	 */
	static function create($name, $version, $installationDate)
	{
		if(empty($name))
		{
			throw new \InvalidArgumentException('Name can not be empty.');
		}
		elseif(empty($version))
		{
			throw new \InvalidArgumentException('Version can not be empty.');
		}
		
		return new self($name, $version, $installationDate);
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
	
	
	/**
	 * @return string
	 */
	public function installationDate()
	{
		return $this->installationDate;
	}
}