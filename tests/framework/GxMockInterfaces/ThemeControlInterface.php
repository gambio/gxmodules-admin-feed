<?php
/* --------------------------------------------------------------
   ThemeControlInterface.inc.php 2019-01-15
   Gambio GmbH
   http://www.gambio.de
   Copyright (c) 2019 Gambio GmbH
   Released under the GNU General Public License (Version 2)
   [http://www.gnu.org/licenses/gpl-2.0.html]
   --------------------------------------------------------------
*/

namespace Gambio\AdminFeed\Tests\GxMockInterfaces;

/**
 * Interface ThemeControlInterface
 *
 * @package Gambio\AdminFeed\Tests\GxMockInterfaces
 */
interface ThemeControlInterface
{
	/**
	 * Returns the status of the theme system. True, if theme system is active, otherwise false.
	 *
	 * @return bool
	 */
	public function isThemeSystemActive();
	
	
	/**
	 * Returns the current theme name. If the theme system is not active, the current template name will be returned.
	 *
	 * @return string
	 */
	public function getCurrentTheme();
	
	
	/**
	 * Returns the path to the template settings file, based on the shop root directory.
	 *
	 * @return float
	 */
	public function getThemeVersion();
}