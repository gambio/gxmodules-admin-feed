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

use Gambio\AdminFeed\Services\ShopInformation\ValueObjects\Interfaces\TemplateDetailsInterface;

/**
 * Class TemplateDetails
 *
 * @package Gambio\AdminFeed\Services\ShopInformation\ValueObjects
 */
class TemplateDetails implements TemplateDetailsInterface
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
	 * @var bool
	 */
	private $mobileCandyInstalled;
	
	
	/**
	 * @param array  $available
	 * @param string $selected
	 * @param array  $configuration
	 * @param bool   $mobileCandyInstalled
	 */
	public function __construct(array $available, $selected, array $configuration, $mobileCandyInstalled)
	{
		$this->available            = $available;
		$this->selected             = $selected;
		$this->configuration        = $configuration;
		$this->mobileCandyInstalled = $mobileCandyInstalled;
	}
	
	
	/**
	 * @param array  $available
	 * @param string $selected
	 * @param array  $configuration
	 * @param bool   $mobileCandyInstalled
	 *
	 * @return self
	 */
	static function create(array $available, $selected, array $configuration, $mobileCandyInstalled)
	{
		return new self($available, $selected, $configuration, $mobileCandyInstalled);
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
	
	
	/**
	 * @return bool
	 */
	public function mobileCandyInstalled()
	{
		return $this->mobileCandyInstalled;
	}
}