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
	 * @var string
	 */
	private $name;
	
	/**
	 * @var string
	 */
	private $owner;
	
	
	/**
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
	 * @param string $name
	 * @param string $owner
	 * @param string $version
	 * @param string $url
	 * @param string $key
	 * @param array  $languages
	 * @param string $defaultLanguage
	 * @param array  $countries
	 *
	 * @return self
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
		return new self($name, $owner, $version, $url, $key, $languages, $defaultLanguage, $countries);
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
	public function owner()
	{
		return $this->owner;
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
	public function url()
	{
		return $this->url;
	}
	
	
	/**
	 * @return string
	 */
	public function key()
	{
		return $this->key;
	}
	
	
	/**
	 * @return array
	 */
	public function languages()
	{
		return $this->languages;
	}
	
	
	/**
	 * @return string
	 */
	public function defaultLanguage()
	{
		return $this->defaultLanguage;
	}
	
	
	/**
	 * @return array
	 */
	public function countries()
	{
		return $this->countries;
	}
}