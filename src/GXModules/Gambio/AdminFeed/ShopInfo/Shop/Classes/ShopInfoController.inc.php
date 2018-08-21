<?php
/* --------------------------------------------------------------
   ShopInfoController.inc.php 2018-07-26
   Gambio GmbH
   http://www.gambio.de
   Copyright (c) 2018 Gambio GmbH
   Released under the GNU General Public License (Version 2)
   [http://www.gnu.org/licenses/gpl-2.0.html]
   --------------------------------------------------------------
*/

/**
 * Class ShopInfoController
 */
class ShopInfoController extends HttpViewController
{
	public function actionDefault()
	{
		return new HttpControllerResponse('Hello World!');
	}
}