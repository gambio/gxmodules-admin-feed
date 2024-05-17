<?php
/* --------------------------------------------------------------
   ShopInformationSerializer.php 2019-01-15
   Gambio GmbH
   http://www.gambio.de
   Copyright (c) 2019 Gambio GmbH
   Released under the GNU General Public License (Version 2)
   [http://www.gnu.org/licenses/gpl-2.0.html]
   --------------------------------------------------------------
*/

namespace Gambio\AdminFeed\Services\ShopInformation\Serializer;

use Gambio\AdminFeed\Services\ShopInformation\Entities\ShopInformation;
use InvalidArgumentException;

/**
 * Class ShopInformationSerializer
 *
 * @package Gambio\AdminFeed\Services\ShopInformation\Serializer
 */
class ShopInformationSerializer
{
    /**
     * ShopInformationSerializer constructor.
     *
     * @param ShopDetailsSerializer $shopDetailsSerializer
     * @param ServerDetailsSerializer $serverDetailsSerializer
     * @param ModulesDetailsSerializer $modulesDetailsSerializer
     * @param ThemeDetailsSerializer $themeDetailsSerializer
     * @param UpdatesDetailsSerializer $updatesDetailsSerializer
     */
    public function __construct(
        private readonly ShopDetailsSerializer $shopDetailsSerializer,
        private readonly ServerDetailsSerializer $serverDetailsSerializer,
        private readonly ModulesDetailsSerializer $modulesDetailsSerializer,
        private readonly ThemeDetailsSerializer $themeDetailsSerializer,
        private readonly UpdatesDetailsSerializer $updatesDetailsSerializer
    ) {
    }


    /**
     * Serializes a given ShopInformation instance.
     *
     * @param ShopInformation $shopInformation
     *
     * @return array
     */
    public function serialize(ShopInformation $shopInformation)
    {
        $json = [
            'shop' => $this->shopDetailsSerializer->serialize($shopInformation->shop()),
            'server' => $this->serverDetailsSerializer->serialize($shopInformation->server()),
            'modules' => $this->modulesDetailsSerializer->serialize($shopInformation->modules()),
            'themes' => $this->themeDetailsSerializer->serialize($shopInformation->themes()),
            'updates' => $this->updatesDetailsSerializer->serialize($shopInformation->updates()),
            'version' => $shopInformation->version(),
        ];

        return $json;
    }


    /**
     * Returns a new ShopInformation instance by using the data of a given array or json strings.
     *
     * @param string|array $json
     *
     * @return ShopInformation
     */
    public function deserialize($json)
    {
        if (!is_array($json)) {
            $json = json_decode($json, true);
        }

        $neededProperties = [
            'shop',
            'server',
            'modules',
            'themes',
            'updates',
            'version',
        ];
        foreach ($neededProperties as $property) {
            if (!array_key_exists($property, $json)) {
                throw new InvalidArgumentException(
                    'Property "' . $property
                    . '" is missing in ShopInformationSerializer.'
                );
            }
        }

        $shop = $this->shopDetailsSerializer->deserialize($json['shop']);
        $server = $this->serverDetailsSerializer->deserialize($json['server']);
        $modules = $this->modulesDetailsSerializer->deserialize($json['modules']);
        $themes = $this->themeDetailsSerializer->deserialize($json['themes']);
        $updates = $this->updatesDetailsSerializer->deserialize($json['updates']);

        return ShopInformation::create($shop, $server, $modules, $themes, $updates, $json['version']);
    }
}