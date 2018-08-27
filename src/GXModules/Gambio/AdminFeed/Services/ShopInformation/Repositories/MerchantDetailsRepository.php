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
 * Class MerchantDetailsRepository
 *
 * @package Gambio\AdminFeed\Services\ShopInformation\Repositories
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
	 * Returns the merchant details.
	 *
	 * @return \Gambio\AdminFeed\Services\ShopInformation\ValueObjects\MerchantDetails
	 */
	public function getMerchantDetails()
	{
		return $this->mapper->getMerchantDetails();
	}
}