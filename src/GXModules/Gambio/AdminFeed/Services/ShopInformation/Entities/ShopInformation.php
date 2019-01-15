<?php
/* --------------------------------------------------------------
   ShopInformation.php 2019-01-15
   Gambio GmbH
   http://www.gambio.de
   Copyright (c) 2019 Gambio GmbH
   Released under the GNU General Public License (Version 2)
   [http://www.gnu.org/licenses/gpl-2.0.html]
   --------------------------------------------------------------
*/

namespace Gambio\AdminFeed\Services\ShopInformation\Entities;

use Gambio\AdminFeed\Services\ShopInformation\ValueObjects\FileSystemDetails;
use Gambio\AdminFeed\Services\ShopInformation\ValueObjects\ModulesDetails;
use Gambio\AdminFeed\Services\ShopInformation\ValueObjects\ServerDetails;
use Gambio\AdminFeed\Services\ShopInformation\ValueObjects\ShopDetails;
use Gambio\AdminFeed\Services\ShopInformation\ValueObjects\ThemeDetails;
use Gambio\AdminFeed\Services\ShopInformation\ValueObjects\MerchantDetails;
use Gambio\AdminFeed\Services\ShopInformation\ValueObjects\UpdatesDetails;

/**
 * Class ShopInformation
 *
 * @package Gambio\AdminFeed\Services\ShopInformation\Entities
 */
class ShopInformation
{
	/**
	 * @var \Gambio\AdminFeed\Services\ShopInformation\ValueObjects\ShopDetails
	 */
	private $shop;
	
	/**
	 * @var \Gambio\AdminFeed\Services\ShopInformation\ValueObjects\ServerDetails
	 */
	private $server;
	
	/**
	 * @var \Gambio\AdminFeed\Services\ShopInformation\ValueObjects\ModulesDetails
	 */
	private $modules;
	
	/**
	 * @var \Gambio\AdminFeed\Services\ShopInformation\ValueObjects\ThemeDetails
	 */
	private $themes;
	
	/**
	 * @var \Gambio\AdminFeed\Services\ShopInformation\ValueObjects\FileSystemDetails
	 */
	private $filesystem;
	
	/**
	 * @var \Gambio\AdminFeed\Services\ShopInformation\ValueObjects\UpdatesDetails
	 */
	private $updates;
	
	
	/**
	 * ShopInformation constructor.
	 *
	 * @param \Gambio\AdminFeed\Services\ShopInformation\ValueObjects\ShopDetails       $shop
	 * @param \Gambio\AdminFeed\Services\ShopInformation\ValueObjects\ServerDetails     $server
	 * @param \Gambio\AdminFeed\Services\ShopInformation\ValueObjects\ModulesDetails    $modules
	 * @param \Gambio\AdminFeed\Services\ShopInformation\ValueObjects\ThemeDetails      $themes
	 * @param \Gambio\AdminFeed\Services\ShopInformation\ValueObjects\FileSystemDetails $filesystem
	 * @param \Gambio\AdminFeed\Services\ShopInformation\ValueObjects\UpdatesDetails    $updates
	 */
	public function __construct(ShopDetails $shop,
	                            ServerDetails $server,
	                            ModulesDetails $modules,
	                            ThemeDetails $themes,
	                            FileSystemDetails $filesystem,
	                            UpdatesDetails $updates)
	{
		$this->shop       = $shop;
		$this->server     = $server;
		$this->modules    = $modules;
		$this->themes     = $themes;
		$this->filesystem = $filesystem;
		$this->updates    = $updates;
	}
	
	
	/**
	 * Creates and returns a new ShopInformation instance.
	 *
	 * @param \Gambio\AdminFeed\Services\ShopInformation\ValueObjects\ShopDetails       $shop
	 * @param \Gambio\AdminFeed\Services\ShopInformation\ValueObjects\ServerDetails     $server
	 * @param \Gambio\AdminFeed\Services\ShopInformation\ValueObjects\ModulesDetails    $modules
	 * @param \Gambio\AdminFeed\Services\ShopInformation\ValueObjects\ThemeDetails      $themes
	 * @param \Gambio\AdminFeed\Services\ShopInformation\ValueObjects\FileSystemDetails $filesystem
	 * @param \Gambio\AdminFeed\Services\ShopInformation\ValueObjects\UpdatesDetails    $updates
	 *
	 * @return \Gambio\AdminFeed\Services\ShopInformation\Entities\ShopInformation
	 */
	static function create(ShopDetails $shop,
	                       ServerDetails $server,
	                       ModulesDetails $modules,
	                       ThemeDetails $themes,
	                       FileSystemDetails $filesystem,
	                       UpdatesDetails $updates)
	{
		return new self($shop, $server, $modules, $themes, $filesystem, $updates);
	}
	
	
	/**
	 * Returns the shop details.
	 *
	 * @return \Gambio\AdminFeed\Services\ShopInformation\ValueObjects\ShopDetails
	 */
	public function shop()
	{
		return $this->shop;
	}
	
	
	/**
	 * Returns the server details.
	 *
	 * @return \Gambio\AdminFeed\Services\ShopInformation\ValueObjects\ServerDetails
	 */
	public function server()
	{
		return $this->server;
	}
	
	
	/**
	 * Returns the modules details.
	 *
	 * @return \Gambio\AdminFeed\Services\ShopInformation\ValueObjects\ModulesDetails
	 */
	public function modules()
	{
		return $this->modules;
	}
	
	
	/**
	 * Returns the theme details.
	 *
	 * @return \Gambio\AdminFeed\Services\ShopInformation\ValueObjects\ThemeDetails
	 */
	public function themes()
	{
		return $this->themes;
	}
	
	
	/**
	 * Returns the filesystem details.
	 *
	 * @return \Gambio\AdminFeed\Services\ShopInformation\ValueObjects\FileSystemDetails
	 */
	public function filesystem()
	{
		return $this->filesystem;
	}
	
	
	/**
	 * Returns the updates details.
	 *
	 * @return \Gambio\AdminFeed\Services\ShopInformation\ValueObjects\UpdatesDetails
	 */
	public function updates()
	{
		return $this->updates;
	}
}