<?php
/* --------------------------------------------------------------
   ModuleDetails.php 2018-08-01
   Gambio GmbH
   http://www.gambio.de
   Copyright (c) 2018 Gambio GmbH
   Released under the GNU General Public License (Version 2)
   [http://www.gnu.org/licenses/gpl-2.0.html]
   --------------------------------------------------------------
*/

namespace Gambio\AdminFeed\Services\ShopInformation\ValueObjects;

/**
 * Class ModuleDetails
 *
 * @package Gambio\AdminFeed\Services\ShopInformation\ValueObjects
 */
class ModuleDetails
{
	/**
	 * @var string
	 */
	private $name;
	
	/**
	 * @var bool
	 */
	private $installed;
	
	/**
	 * @var bool|null
	 */
	private $enabled;
	
	
	/**
	 * @param string    $name
	 * @param bool      $installed
	 * @param bool|null $enabled
	 */
	public function __construct($name, $installed, $enabled)
	{
		$this->name      = $name;
		$this->installed = $installed;
		$this->enabled   = $enabled;
	}
	
	
	/**
	 * @param string    $name
	 * @param bool      $installed
	 * @param bool|null $enabled
	 *
	 * @return self
	 */
	static function create($name, $installed, $enabled)
	{
		return new self($name, $installed, $enabled);
	}
	
	
	/**
	 * @return string
	 */
	public function name()
	{
		return $this->name;
	}
	
	
	/**
	 * @return bool
	 */
	public function installed()
	{
		return $this->installed;
	}
	
	
	/**
	 * @return bool|null
	 */
	public function enabled()
	{
		return $this->enabled;
	}
}