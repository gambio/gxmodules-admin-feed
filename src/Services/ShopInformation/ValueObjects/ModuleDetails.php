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

use Gambio\AdminFeed\Services\ShopInformation\ValueObjects\Interfaces\ModuleDetailsInterface;

/**
 * Class ModuleDetails
 *
 * @package Gambio\AdminFeed\Services\ShopInformation\ValueObjects
 */
class ModuleDetails implements ModuleDetailsInterface
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
	 * @var bool
	 */
	private $enabled;
	
	
	/**
	 * @param string $name
	 * @param bool   $installed
	 * @param bool   $enabled
	 */
	public function __construct($name, $installed, $enabled)
	{
		$this->name      = $name;
		$this->installed = $installed;
		$this->active    = $enabled;
	}
	
	
	/**
	 * @param string $name
	 * @param bool   $installed
	 * @param bool   $enabled
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
	 * @return bool
	 */
	public function enabled()
	{
		return $this->enabled;
	}
}