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

use Gambio\AdminFeed\Services\ShopInformation\ValueObjects\ModulesDetails;
use Gambio\AdminFeed\Services\ShopInformation\ValueObjects\ServerDetails;
use Gambio\AdminFeed\Services\ShopInformation\ValueObjects\ShopDetails;
use Gambio\AdminFeed\Services\ShopInformation\ValueObjects\ThemeDetails;
use Gambio\AdminFeed\Services\ShopInformation\ValueObjects\UpdatesDetails;

/**
 * Class ShopInformation
 *
 * @package Gambio\AdminFeed\Services\ShopInformation\Entities
 */
class ShopInformation
{
    /**
     * ShopInformation constructor.
     *
     * @param ShopDetails $shop
     * @param ServerDetails $server
     * @param ModulesDetails $modules
     * @param ThemeDetails $themes
     * @param int $version
     */
    public function __construct(
        private readonly ShopDetails $shop,
        private readonly ServerDetails $server,
        private readonly ModulesDetails $modules,
        private readonly ThemeDetails $themes,
        private $version = 1
    ) {
    }


    /**
     * Creates and returns a new ShopInformation instance.
     *
     * @param ShopDetails $shop
     * @param ServerDetails $server
     * @param ModulesDetails $modules
     * @param ThemeDetails $themes
     * @param int $version
     *
     * @return ShopInformation
     */
    static function create(
        ShopDetails $shop,
        ServerDetails $server,
        ModulesDetails $modules,
        ThemeDetails $themes,
        $version = 1
    ) {
        return new self($shop, $server, $modules, $themes, $version);
    }


    /**
     * Returns the shop details.
     *
     * @return ShopDetails
     */
    public function shop()
    {
        return $this->shop;
    }


    /**
     * Returns the server details.
     *
     * @return ServerDetails
     */
    public function server()
    {
        return $this->server;
    }


    /**
     * Returns the modules details.
     *
     * @return ModulesDetails
     */
    public function modules()
    {
        return $this->modules;
    }


    /**
     * Returns the theme details.
     *
     * @return ThemeDetails
     */
    public function themes()
    {
        return $this->themes;
    }


    /**
     * Returns the version of these server information object.
     *
     * @return int
     */
    public function version()
    {
        return $this->version;
    }
}