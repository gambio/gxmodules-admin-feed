<?php
/* --------------------------------------------------------------
   TemplateDetailsMapper.php 2018-08-01
   Gambio GmbH
   http://www.gambio.de
   Copyright (c) 2018 Gambio GmbH
   Released under the GNU General Public License (Version 2)
   [http://www.gnu.org/licenses/gpl-2.0.html]
   --------------------------------------------------------------
*/

namespace Gambio\AdminFeed\Services\ShopInformation\Mapper;

use Gambio\AdminFeed\Services\ShopInformation\Reader\TemplateDetailsReader;
use Gambio\AdminFeed\Services\ShopInformation\ValueObjects\TemplateDetails;

/**
 * Class TemplateDetailsMapper
 *
 * @package Gambio\AdminFeed\Services\ShopInformation\Mapper
 */
class TemplateDetailsMapper
{
	/**
	 * @var \Gambio\AdminFeed\Services\ShopInformation\Reader\TemplateDetailsReader
	 */
	private $reader;
	
	
	/**
	 * TemplateDetailsMapper constructor.
	 *
	 * @param \Gambio\AdminFeed\Services\ShopInformation\Reader\TemplateDetailsReader $reader
	 */
	public function __construct(TemplateDetailsReader $reader)
	{
		$this->reader = $reader;
	}
	
	
	/**
	 * @return \Gambio\AdminFeed\Services\ShopInformation\ValueObjects\TemplateDetails
	 */
	public function getTemplateDetails()
	{
		return new TemplateDetails($this->reader->getAvailableTemplates(), $this->reader->getSelectedTemplate(),
		                           $this->reader->getSelectedTemplateVersion());
	}
}