<?php
/* --------------------------------------------------------------
   ShopDetails.php 2018-08-01
   Gambio GmbH
   http://www.gambio.de
   Copyright (c) 2018 Gambio GmbH
   Released under the GNU General Public License (Version 2)
   [http://www.gnu.org/licenses/gpl-2.0.html]
   --------------------------------------------------------------
*/

namespace Gambio\AdminFeed\Services\ShopInformation\ValueObjects;

use InvalidArgumentException;

/**
 * Class ShopDetails
 *
 * @package Gambio\AdminFeed\Services\ShopInformation\ValueObjects
 */
class ShopDetails
{
    /**
     * ShopDetails constructor.
     *
     * @param string $version
     * @param string $url
     * @param string $key
     * @param array  $languages
     * @param string $defaultLanguage
     * @param array  $countries
     */
    public function __construct(private $version, private $url, private $key, private readonly array $languages, private $defaultLanguage, private readonly array $countries)
    {
    }
    
    
    /**
     * Creates and returns a new ShopDetails instance.
     *
     * @param string $version
     * @param string $url
     * @param string $key
     * @param array  $languages
     * @param string $defaultLanguage
     * @param array  $countries
     *
     * @return ShopDetails
     */
    static function create(
        $version,
        $url,
        $key,
        array $languages,
        $defaultLanguage,
        array $countries
    ) {
        if (empty($version)) {
            throw new InvalidArgumentException('Version can not be empty.');
        } elseif (empty($url)) {
            throw new InvalidArgumentException('URL can not be empty.');
        } elseif (!str_starts_with($url, 'http://') && !str_starts_with($url, 'https://')) {
            throw new InvalidArgumentException('URL is invalid.');
        }
        
        return new self($version, $url, $key, $languages, $defaultLanguage, $countries);
    }
    
    
    /**
     * Returns the version of the shop.
     *
     * @return string
     */
    public function version()
    {
        return $this->version;
    }
    
    
    /**
     * Returns the URL of the shop.
     *
     * @return string
     */
    public function url()
    {
        return $this->url;
    }
    
    
    /**
     * Returns the shop key of the shop.
     *
     * @return string
     */
    public function key()
    {
        return $this->key;
    }
    
    
    /**
     * Returns a list of all available languages of the shop.
     *
     * @return array
     */
    public function languages()
    {
        return $this->languages;
    }
    
    
    /**
     * Returns the default language of the shop.
     *
     * @return string
     */
    public function defaultLanguage()
    {
        return $this->defaultLanguage;
    }
    
    
    /**
     * Returns a list of all available countries of the shop.
     *
     * @return array
     */
    public function countries()
    {
        return $this->countries;
    }
}