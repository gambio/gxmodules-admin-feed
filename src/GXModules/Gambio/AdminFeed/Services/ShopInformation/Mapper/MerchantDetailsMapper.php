<?php
/* --------------------------------------------------------------
   MerchantDetailsMapper.php 2018-08-01
   Gambio GmbH
   http://www.gambio.de
   Copyright (c) 2018 Gambio GmbH
   Released under the GNU General Public License (Version 2)
   [http://www.gnu.org/licenses/gpl-2.0.html]
   --------------------------------------------------------------
*/

namespace Gambio\AdminFeed\Services\ShopInformation\Mapper;

use Gambio\AdminFeed\Services\ShopInformation\Reader\MerchantDetailsReader;
use Gambio\AdminFeed\Services\ShopInformation\ValueObjects\MerchantAddressDetails;
use Gambio\AdminFeed\Services\ShopInformation\ValueObjects\MerchantDetails;

/**
 * Class MerchantDetailsMapper
 *
 * @package Gambio\AdminFeed\Services\ShopInformation\Mapper
 */
class MerchantDetailsMapper
{
	/**
	 * @var \Gambio\AdminFeed\Services\ShopInformation\Reader\MerchantDetailsReader
	 */
	private $reader;
	
	
	/**
	 * MerchantDetailsMapper constructor.
	 *
	 * @param \Gambio\AdminFeed\Services\ShopInformation\Reader\MerchantDetailsReader $reader
	 */
	public function __construct(MerchantDetailsReader $reader)
	{
		$this->reader = $reader;
	}
	
	
	/**
	 * @return \Gambio\AdminFeed\Services\ShopInformation\ValueObjects\MerchantDetails
	 */
	public function getMerchantDetails()
	{
		$address = MerchantAddressDetails::create($this->reader->getStreet(), $this->reader->getHouseNumber(),
		                                          $this->reader->getPostalCode(), $this->reader->getCity(),
		                                          $this->reader->getState(), $this->reader->getCountry());
		
		return MerchantDetails::create($this->reader->getCompany(), $this->reader->getFirstname(),
		                               $this->reader->getLastname(), $address, $this->reader->getTelefon(),
		                               $this->reader->getTelefax(), $this->reader->getEmail());
	}
}