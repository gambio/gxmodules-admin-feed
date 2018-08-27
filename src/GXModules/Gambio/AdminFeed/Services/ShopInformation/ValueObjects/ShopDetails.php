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

/**
 * Class ShopDetails
 *
 * @package Gambio\AdminFeed\Services\ShopInformation\ValueObjects
 */
class ShopDetails
{
	/**
	 * @var string
	 */
	private $name;
	
	/**
	 * @var string
	 */
	private $owner;
	
	/**
	 * @var string
	 */
	private $version;
	
	/**
	 * @var string
	 */
	private $url;
	
	/**
	 * @var string
	 */
	private $key;
	
	/**
	 * @var array
	 */
	private $languages;
	
	/**
	 * @var string
	 */
	private $defaultLanguage = '';
	
	/**
	 * @var array
	 */
	private $countries;
	
	
	/**
	 * ShopDetails constructor.
	 *
	 * @param string $name
	 * @param string $owner
	 * @param string $version
	 * @param string $url
	 * @param string $key
	 * @param array  $languages
	 * @param string $defaultLanguage
	 * @param array  $countries
	 */
	public function __construct($name,
	                            $owner,
	                            $version,
	                            $url,
	                            $key,
	                            array $languages,
	                            $defaultLanguage,
	                            array $countries)
	{
		$this->name            = $name;
		$this->owner           = $owner;
		$this->version         = $version;
		$this->url             = $url;
		$this->key             = $key;
		$this->languages       = $languages;
		$this->defaultLanguage = $defaultLanguage;
		$this->countries       = $countries;
	}
	
	
	/**
	 * Creates and returns a new ShopDetails instance.
	 *
	 * @param string $name
	 * @param string $owner
	 * @param string $version
	 * @param string $url
	 * @param string $key
	 * @param array  $languages
	 * @param string $defaultLanguage
	 * @param array  $countries
	 *
	 * @return \Gambio\AdminFeed\Services\ShopInformation\ValueObjects\ShopDetails
	 */
	static function create($name,
	                       $owner,
	                       $version,
	                       $url,
	                       $key,
	                       array $languages,
	                       $defaultLanguage,
	                       array $countries)
	{
		if(empty($version))
		{
			throw new \InvalidArgumentException('Version can not be empty.');
		}
		elseif(empty($url))
		{
			throw new \InvalidArgumentException('Url can not be empty.');
		}
		elseif(substr($url, 0, 7) !== 'http://' && substr($url, 0, 8) !== 'https://')
		{
			throw new \InvalidArgumentException('Url is invalid.');
		}
		
		return new self($name, $owner, $version, $url, $key, $languages, $defaultLanguage, $countries);
	}
	
	
	/**
	 * Returns the name of the shop.
	 *
	 * @return string
	 */
	public function name()
	{
		return $this->name;
	}
	
	
	/**
	 * Returns the owner of the shop.
	 *
	 * @return string
	 */
	public function owner()
	{
		return $this->owner;
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
	 * Returns the url of the shop.
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