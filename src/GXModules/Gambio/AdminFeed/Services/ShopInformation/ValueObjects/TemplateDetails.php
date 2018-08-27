<?php
/* --------------------------------------------------------------
   TemplateDetails.php 2018-08-01
   Gambio GmbH
   http://www.gambio.de
   Copyright (c) 2018 Gambio GmbH
   Released under the GNU General Public License (Version 2)
   [http://www.gnu.org/licenses/gpl-2.0.html]
   --------------------------------------------------------------
*/

namespace Gambio\AdminFeed\Services\ShopInformation\ValueObjects;

/**
 * Class TemplateDetails
 *
 * @package Gambio\AdminFeed\Services\ShopInformation\ValueObjects
 */
class TemplateDetails
{
	/**
	 * @var array
	 */
	private $available;
	
	/**
	 * @var string
	 */
	private $selected;
	
	/**
	 * @var string
	 */
	private $version;
	
	
	/**
	 * TemplateDetails constructor.
	 *
	 * @param array  $available
	 * @param string $selected
	 * @param string $version
	 */
	public function __construct(array $available, $selected, $version)
	{
		$this->available = $available;
		$this->selected  = $selected;
		$this->version   = $version;
	}
	
	
	/**
	 * Creates and returns a new TemplateDetails instance.
	 *
	 * @param array  $available
	 * @param string $selected
	 * @param string $version
	 *
	 * @return \Gambio\AdminFeed\Services\ShopInformation\ValueObjects\TemplateDetails
	 */
	static function create(array $available, $selected, $version)
	{
		return new self($available, $selected, $version);
	}
	
	
	/**
	 * Returns a list of available templates.
	 *
	 * @return array
	 */
	public function available()
	{
		return $this->available;
	}
	
	
	/**
	 * Returns the name of the active template.
	 *
	 * @return string
	 */
	public function selected()
	{
		return $this->selected;
	}
	
	
	/**
	 * Returns the version of the active template.
	 *
	 * @return array
	 */
	public function version()
	{
		return $this->version;
	}
}