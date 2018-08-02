<?php
/* --------------------------------------------------------------
   PhpServerDetails.php 2018-08-01
   Gambio GmbH
   http://www.gambio.de
   Copyright (c) 2018 Gambio GmbH
   Released under the GNU General Public License (Version 2)
   [http://www.gnu.org/licenses/gpl-2.0.html]
   --------------------------------------------------------------
*/

namespace Gambio\AdminFeed\Services\ShopInformation\ValueObjects;

use Gambio\AdminFeed\Services\ShopInformation\ValueObjects\Interfaces\PhpServerDetailsInterface;

/**
 * Class PhpServerDetails
 *
 * @package Gambio\AdminFeed\Services\ShopInformation\ValueObjects
 */
class PhpServerDetails implements PhpServerDetailsInterface
{
	/**
	 * @var string
	 */
	private $version;
	
	/**
	 * @var array
	 */
	private $extensions;
	
	
	/**
	 * @param string $version
	 * @param array  $extensions
	 */
	public function __construct($version,
	                            array $extensions)
	{
		$this->version    = $version;
		$this->extensions = $extensions;
	}
	
	
	/**
	 * @param string $version
	 * @param array  $extensions
	 *
	 * @return self
	 */
	static function create($version, array $extensions)
	{
		return new self($version, $extensions);
	}
	
	
	/**
	 * @return string
	 */
	public function version()
	{
		return $this->version;
	}
	
	
	/**
	 * @return array
	 */
	public function extensions()
	{
		return $this->extensions;
	}
	
}