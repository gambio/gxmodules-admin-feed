<?php
/* --------------------------------------------------------------
   ServerDetailsInterface.php 2018-08-01
   Gambio GmbH
   http://www.gambio.de
   Copyright (c) 2018 Gambio GmbH
   Released under the GNU General Public License (Version 2)
   [http://www.gnu.org/licenses/gpl-2.0.html]
   --------------------------------------------------------------
*/

namespace Gambio\AdminFeed\Services\ShopInformation\ValueObjects\Interfaces;

/**
 * Interface ServerDetailsInterface
 *
 * @package Gambio\AdminFeed\Services\ShopInformation\ValueObjects\Interfaces
 */
interface ServerDetailsInterface
{
	/**
	 * @param \Gambio\AdminFeed\Services\ShopInformation\ValueObjects\Interfaces\PhpServerDetailsInterface   $php
	 * @param \Gambio\AdminFeed\Services\ShopInformation\ValueObjects\Interfaces\MysqlServerDetailsInterface $mysql
	 *
	 * @return self
	 */
	static function create(PhpServerDetailsInterface $php, MysqlServerDetailsInterface $mysql);
	
	
	/**
	 * @return \Gambio\AdminFeed\Services\ShopInformation\ValueObjects\Interfaces\PhpServerDetailsInterface
	 */
	public function php();
	
	
	/**
	 * @return \Gambio\AdminFeed\Services\ShopInformation\ValueObjects\Interfaces\MysqlServerDetailsInterface
	 */
	public function mysql();
}