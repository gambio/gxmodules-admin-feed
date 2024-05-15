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
	
	public const SHOP_URL       = ''; // Shop base URL *** without the trailing slash ***.
	public const ADMIN_USER     = '';
	public const ADMIN_PASSWORD = '';
	
	public const HUB_CLIENT_KEY = '';
	
	// ------------------------------------------------------------------------
	// DATABASE CREDENTIALS
	// ------------------------------------------------------------------------
	
	public const DB_HOST     = '';
	public const DB_USER     = '';
	public const DB_PASSWORD = '';
	public const DB_NAME     = '';
}