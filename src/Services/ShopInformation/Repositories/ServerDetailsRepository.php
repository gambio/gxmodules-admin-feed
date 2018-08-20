<?php
/* --------------------------------------------------------------
   ServerDetailsRepository.php 2018-08-01
   Gambio GmbH
   http://www.gambio.de
   Copyright (c) 2018 Gambio GmbH
   Released under the GNU General Public License (Version 2)
   [http://www.gnu.org/licenses/gpl-2.0.html]
   --------------------------------------------------------------
*/

namespace Gambio\AdminFeed\Services\ShopInformation\Repositories;

use Gambio\AdminFeed\Services\ShopInformation\Mapper\ServerDetailsMapper;

/**
 * Interface ServerDetailsRepository
 *
 * @package Gambio\AdminFeed\Services\ShopInformation\Repositories\Interfaces
 */
class ServerDetailsRepository
{
	/**
	 * @var \Gambio\AdminFeed\Services\ShopInformation\Mapper\ServerDetailsMapper
	 */
	private $mapper;
	
	
	/**
	 * ServerDetailsRepository constructor.
	 *
	 * @param \Gambio\AdminFeed\Services\ShopInformation\Mapper\ServerDetailsMapper $mapper
	 */
	public function __construct(ServerDetailsMapper $mapper)
	{
		$this->mapper = $mapper;
	}
	
	
	/**
	 * @param \Gambio\AdminFeed\Services\ShopInformation\Mapper\ServerDetailsMapper $mapper
	 *
	 * @return self
	 */
	static function create(ServerDetailsMapper $mapper)
	{
		return new self($mapper);
	}
	
	
	/**
	 * @return \Gambio\AdminFeed\Services\ShopInformation\ValueObjects\ServerDetails
	 */
	public function getServerDetails()
	{
		return $this->mapper->getServerDetails();
	}
}