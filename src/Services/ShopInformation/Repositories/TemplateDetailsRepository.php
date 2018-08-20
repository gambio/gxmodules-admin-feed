<?php
/* --------------------------------------------------------------
   TemplateDetailsRepository.php 2018-08-01
   Gambio GmbH
   http://www.gambio.de
   Copyright (c) 2018 Gambio GmbH
   Released under the GNU General Public License (Version 2)
   [http://www.gnu.org/licenses/gpl-2.0.html]
   --------------------------------------------------------------
*/

namespace Gambio\AdminFeed\Services\ShopInformation\Repositories;

use Gambio\AdminFeed\Services\ShopInformation\Mapper\TemplateDetailsMapper;

/**
 * Interface TemplateDetailsRepository
 *
 * @package Gambio\AdminFeed\Services\ShopInformation\Repositories\Interfaces
 */
class TemplateDetailsRepository
{
	/**
	 * @var \Gambio\AdminFeed\Services\ShopInformation\Mapper\TemplateDetailsMapper
	 */
	private $mapper;
	
	
	/**
	 * TemplateDetailsRepository constructor.
	 *
	 * @param \Gambio\AdminFeed\Services\ShopInformation\Mapper\TemplateDetailsMapper $mapper
	 */
	public function __construct(TemplateDetailsMapper $mapper)
	{
		$this->mapper = $mapper;
	}
	
	
	/**
	 * @param \Gambio\AdminFeed\Services\ShopInformation\Mapper\TemplateDetailsMapper $mapper
	 *
	 * @return self
	 */
	static function create(TemplateDetailsMapper $mapper)
	{
		return new self($mapper);
	}
	
	
	/**
	 * @return \Gambio\AdminFeed\Services\ShopInformation\ValueObjects\TemplateDetails
	 */
	public function getTemplateDetails()
	{
		return $this->mapper->getTemplateDetails();
	}
}