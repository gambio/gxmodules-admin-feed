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
 * Interface ModuleCenterModuleInterface
 *
 * @package Gambio\AdminFeed\Tests\GxMockClasses
 */
interface ModuleCenterModuleInterface
{
	/**
	 * @return bool
	 */
	public function isInstalled();
	
	
	/**
	 * @return string
	 */
	public function getName();
	
	
	/**
	 * @param $name
	 *
	 * @return mixed
	 */
	public function setName($name);
}