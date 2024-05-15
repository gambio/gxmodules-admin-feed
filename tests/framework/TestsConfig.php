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
	
	public const SHOP_URL       = 'http://192.168.100.133/Shops/GX-Feature'; // Shop base URL *** without the trailing slash ***.
	public const ADMIN_USER     = 'admin@shop.de';
	public const ADMIN_PASSWORD = '12345';
	
	public const HUB_CLIENT_KEY = '';
	
	// ------------------------------------------------------------------------
	// DATABASE CREDENTIALS
	// ------------------------------------------------------------------------
	
	public const DB_HOST     = 'localhost';
	public const DB_USER     = 'developer';
	public const DB_PASSWORD = 'snoopy';
	public const DB_NAME     = 'Admin-Feed';
}