<?php
/* --------------------------------------------------------------
   ThemeDetails.php 2019-01-15
   Gambio GmbH
   http://www.gambio.de
   Copyright (c) 2019 Gambio GmbH
   Released under the GNU General Public License (Version 2)
   [http://www.gnu.org/licenses/gpl-2.0.html]
   --------------------------------------------------------------
*/

namespace Gambio\AdminFeed\Services\ShopInformation\ValueObjects;

/**
 * Class ThemeDetails
 *
 * @package Gambio\AdminFeed\Services\ShopInformation\ValueObjects
 */
class ThemeDetails
{
	/**
	 * TemplateDetails constructor.
	 *
	 * @param array  $available
	 * @param string $selected
	 * @param string $version
	 */
	public function __construct(private readonly array $available, private $selected, private $version)
 {
 }
	
	
	/**
	 * Creates and returns a new ThemeDetails instance.
	 *
	 * @param array  $available
	 * @param string $selected
	 * @param string $version
	 *
	 * @return \Gambio\AdminFeed\Services\ShopInformation\ValueObjects\ThemeDetails
	 */
	static function create(array $available, $selected, $version)
	{
		return new self($available, $selected, $version);
	}
	
	
	/**
	 * Returns a list of available themes and templates.
	 *
	 * @return array
	 */
	public function available()
	{
		return $this->available;
	}
	
	
	/**
	 * Returns the name of the active theme or template.
	 *
	 * @return string
	 */
	public function selected()
	{
		return $this->selected;
	}
	
	
	/**
	 * Returns the version of the active theme or template.
	 *
	 * @return string
	 */
	public function version()
	{
		return $this->version;
	}
}