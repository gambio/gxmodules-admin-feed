<?php
/* --------------------------------------------------------------
   ModuleCenterModuleInterface.inc.php 2018-08-01
   Gambio GmbH
   http://www.gambio.de
   Copyright (c) 2018 Gambio GmbH
   Released under the GNU General Public License (Version 2)
   [http://www.gnu.org/licenses/gpl-2.0.html]
   --------------------------------------------------------------
*/

namespace Gambio\AdminFeed\Tests\GxMockClasses;

/**
 * Interface TemplateControl
 *
 * @package Gambio\AdminFeed\Tests\GxMockClasses
 */
interface TemplateControlInterface
{
	/**
	 * @return string
	 */
	public function get_template_presentation_version();
}