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

use Gambio\AdminFeed\Services\ShopInformation\ValueObjects\Interfaces\ShopDetailsInterface;

/**
 * Class ShopDetails
 *
 * @package Gambio\AdminFeed\Services\ShopInformation\ValueObjects
 */
class ShopDetails implements ShopDetailsInterface
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
	 * @var array
	 */
	private $countries;
	
	
	/**
	 * @param string $version
	 * @param string $url
	 * @param string $key
	 * @param array  $languages
	 * @param array  $countries
	 */
	public function __construct($version,
	                            $url,
	                            $key,
	                            array $languages,
	                            array $countries)
	{
		$this->version   = $version;
		$this->url       = $url;
		$this->key       = $key;
		$this->languages = $languages;
		$this->countries = $countries;
	}
	
	
	/**
	 * @param string $version
	 * @param string $url
	 * @param string $key
	 * @param array  $languages
	 * @param array  $countries
	 *
	 * @return self
	 */
	static function create($version,
	                       $url,
	                       $key,
	                       array $languages,
	                       array $countries)
	{
		return new self($version, $url, $key, $languages, $countries);
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
	 * @return array
	 */
	public function countries()
	{
		return $this->countries;
	}
	
}