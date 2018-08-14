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
	 * @var array
	 */
	private $configuration;
	
	
	/**
	 * @param array  $available
	 * @param string $selected
	 * @param array  $configuration
	 */
	public function __construct(array $available, $selected, array $configuration)
	{
		$this->available            = $available;
		$this->selected             = $selected;
		$this->configuration        = $configuration;
	}
	
	
	/**
	 * @param array  $available
	 * @param string $selected
	 * @param array  $configuration
	 * @param bool   $mobileCandyInstalled
	 *
	 * @return self
	 */
	static function create(array $available, $selected, array $configuration)
	{
		return new self($available, $selected, $configuration);
	}
	
	
	/**
	 * @return array
	 */
	public function available()
	{
		return $this->available;
	}
	
	
	/**
	 * @return string
	 */
	public function selected()
	{
		return $this->selected;
	}
	
	
	/**
	 * @return array
	 */
	public function configuration()
	{
		return $this->configuration;
	}
}