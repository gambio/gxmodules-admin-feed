<?php
/* --------------------------------------------------------------
   ShopDetailsRepository.php 2018-08-01
   Gambio GmbH
   http://www.gambio.de
   Copyright (c) 2018 Gambio GmbH
   Released under the GNU General Public License (Version 2)
   [http://www.gnu.org/licenses/gpl-2.0.html]
   --------------------------------------------------------------
*/

namespace Gambio\AdminFeed\Services\ShopInformation\Repositories;

use Gambio\AdminFeed\Services\ShopInformation\Mapper\ShopDetailsMapper;

/**
 * Interface ShopDetailsRepository
 *
 * @package Gambio\AdminFeed\Services\ShopInformation\Repositories\Interfaces
 */
class ShopDetailsRepository
{
	/**
	 * @var \Gambio\AdminFeed\Services\ShopInformation\Mapper\ShopDetailsMapper
	 */
	private $mapper;
	
	
	/**
	 * ShopDetailsRepository constructor.
	 *
	 * @param \Gambio\AdminFeed\Services\ShopInformation\Mapper\ShopDetailsMapper $mapper
	 */
	public function __construct(ShopDetailsMapper $mapper)
	{
		$this->mapper = $mapper;
	}
	
	
	/**
	 * @param \Gambio\AdminFeed\Services\ShopInformation\Mapper\ShopDetailsMapper $mapper
	 *
	 * @return self
	 */
	static function create(ShopDetailsMapper $mapper)
	{
		return new self($mapper);
	}
	
	
	/**
	 * @return \Gambio\AdminFeed\Services\ShopInformation\ValueObjects\ShopDetails
	 */
	public function getShopDetails()
	{
		return $this->mapper->getShopDetails();
	}
}