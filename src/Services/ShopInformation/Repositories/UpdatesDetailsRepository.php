<?php
/* --------------------------------------------------------------
   UpdatesDetailsRepository.php 2018-08-01
   Gambio GmbH
   http://www.gambio.de
   Copyright (c) 2018 Gambio GmbH
   Released under the GNU General Public License (Version 2)
   [http://www.gnu.org/licenses/gpl-2.0.html]
   --------------------------------------------------------------
*/

namespace Gambio\AdminFeed\Services\ShopInformation\Repositories;

use Gambio\AdminFeed\Services\ShopInformation\Mapper\UpdatesDetailsMapper;

/**
 * Interface UpdatesDetailsRepository
 *
 * @package Gambio\AdminFeed\Services\ShopInformation\Repositories\Interfaces
 */
class UpdatesDetailsRepository
{
	/**
	 * @var \Gambio\AdminFeed\Services\ShopInformation\Mapper\UpdatesDetailsMapper
	 */
	private $mapper;
	
	
	/**
	 * UpdatesDetailsRepository constructor.
	 *
	 * @param \Gambio\AdminFeed\Services\ShopInformation\Mapper\UpdatesDetailsMapper $mapper
	 */
	public function __construct(UpdatesDetailsMapper $mapper)
	{
		$this->mapper = $mapper;
	}
	
	
	/**
	 * @param \Gambio\AdminFeed\Services\ShopInformation\Mapper\UpdatesDetailsMapper $mapper
	 *
	 * @return self
	 */
	static function create(UpdatesDetailsMapper $mapper)
	{
		return new self($mapper);
	}
	
	
	/**
	 * @return \Gambio\AdminFeed\Services\ShopInformation\ValueObjects\UpdatesDetails
	 */
	public function getUpdatesDetails()
	{
		return $this->mapper->getUpdatesDetails();
	}
}