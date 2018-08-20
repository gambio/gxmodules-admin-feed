<?php
/* --------------------------------------------------------------
   MerchantDetailsRepository.php 2018-08-01
   Gambio GmbH
   http://www.gambio.de
   Copyright (c) 2018 Gambio GmbH
   Released under the GNU General Public License (Version 2)
   [http://www.gnu.org/licenses/gpl-2.0.html]
   --------------------------------------------------------------
*/

namespace Gambio\AdminFeed\Services\ShopInformation\Repositories;

use Gambio\AdminFeed\Services\ShopInformation\Mapper\MerchantDetailsMapper;

/**
 * Interface MerchantDetailsRepository
 *
 * @package Gambio\AdminFeed\Services\ShopInformation\Repositories\Interfaces
 */
class MerchantDetailsRepository
{
	/**
	 * @var \Gambio\AdminFeed\Services\ShopInformation\Mapper\MerchantDetailsMapper
	 */
	private $mapper;
	
	
	/**
	 * MerchantDetailsRepository constructor.
	 *
	 * @param \Gambio\AdminFeed\Services\ShopInformation\Mapper\MerchantDetailsMapper $mapper
	 */
	public function __construct(MerchantDetailsMapper $mapper)
	{
		$this->mapper = $mapper;
	}
	
	
	/**
	 * @param \Gambio\AdminFeed\Services\ShopInformation\Mapper\MerchantDetailsMapper $mapper
	 *
	 * @return self
	 */
	static function create(MerchantDetailsMapper $mapper)
	{
		return new self($mapper);
	}
	
	
	/**
	 * @return \Gambio\AdminFeed\Services\ShopInformation\ValueObjects\MerchantDetails
	 */
	public function getMerchantDetails()
	{
		return $this->mapper->getMerchantDetails();
	}
}