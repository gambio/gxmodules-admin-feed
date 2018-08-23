<?php
/* --------------------------------------------------------------
   TestsConfig.php 2018-08-01
   Gambio GmbH
   http://www.gambio.de
   Copyright (c) 2018 Gambio GmbH
   Released under the GNU General Public License (Version 2)
   [http://www.gnu.org/licenses/gpl-2.0.html]
   --------------------------------------------------------------
*/

namespace Gambio\AdminFeed\Tests;

/**
 * Class TestsConfig
 *
 * Contains the test configuration data (url, credentials ...). Before running the
 * tests create a copy of this file and rename it to "TestsConfig.php".
 *
 * DO NOT PUSH "TestsConfig.php" TO THE REPOSITORY.
 */
class TestsConfig
{
	// ------------------------------------------------------------------------
	// GENERAL INFORMATION
	// ------------------------------------------------------------------------
	
	const SHOP_URL       = ''; // Shop base URL *** without the trailing slash ***.
	const ADMIN_USER     = '';
	const ADMIN_PASSWORD = '';
	
	const HUB_CLIENT_KEY = '';
	
	// ------------------------------------------------------------------------
	// DATABASE CREDENTIALS
	// ------------------------------------------------------------------------
	
	const DB_HOST     = '';
	const DB_USER     = '';
	const DB_PASSWORD = '';
	const DB_NAME     = '';
}