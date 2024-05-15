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

/**
 * Class PhpServerDetails
 *
 * @package Gambio\AdminFeed\Services\ShopInformation\ValueObjects
 */
class PhpServerDetails
{
	/**
	 * PhpServerDetails constructor.
	 *
	 * @param string $version
	 * @param array  $extensions
	 * @param array  $configuration
	 */
	public function __construct(private $version, private readonly array $extensions, private readonly array $configuration)
 {
 }
	
	
	/**
	 * Creates and returns a new PhpServerDetails instance.
	 *
	 * @param string $version
	 * @param array  $extensions
	 * @param array  $configuration
	 *
	 * @return \Gambio\AdminFeed\Services\ShopInformation\ValueObjects\PhpServerDetails
	 */
	static function create($version,
	                       array $extensions,
	                       array $configuration)
	{
		return new self($version, $extensions, $configuration);
	}
	
	
	/**
	 * Returns the used php version.
	 *
	 * @return string
	 */
	public function version()
	{
		return $this->version;
	}
	
	
	/**
	 * Returns a list of available php extensions.
	 *
	 * @return array
	 */
	public function extensions()
	{
		return $this->extensions;
	}
	
	
	/**
	 * Returns a list of the used php configuration.
	 *
	 * @return array
	 */
	public function configuration()
	{
		return $this->configuration;
	}
}