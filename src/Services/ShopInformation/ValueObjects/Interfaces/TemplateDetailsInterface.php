<?php
/* --------------------------------------------------------------
   TemplateDetailsInterface.php 2018-08-01
   Gambio GmbH
   http://www.gambio.de
   Copyright (c) 2018 Gambio GmbH
   Released under the GNU General Public License (Version 2)
   [http://www.gnu.org/licenses/gpl-2.0.html]
   --------------------------------------------------------------
*/

namespace Gambio\AdminFeed\Services\ShopInformation\ValueObjects\Interfaces;

/**
 * Class TemplateDetailsInterface
 */
interface TemplateDetailsInterface
{
	/**
	 * @param array  $available
	 * @param string $selected
	 * @param array  $configuration
	 * @param bool   $mobileCandyInstalled
	 *
	 * @return self
	 */
	static function create(array $available, $selected, array $configuration, $mobileCandyInstalled);
	
	
	/**
	 * @return array
	 */
	public function available();
	
	
	/**
	 * @return string
	 */
	public function selected();
	
	
	/**
	 * @return array
	 */
	public function configuration();
	
	
	/**
	 * @return bool
	 */
	public function mobileCandyInstalled();
}