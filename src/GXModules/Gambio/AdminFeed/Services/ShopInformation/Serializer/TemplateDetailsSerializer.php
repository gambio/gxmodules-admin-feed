<?php
/* --------------------------------------------------------------
   TemplateDetailsSerializer.php 2018-08-01
   Gambio GmbH
   http://www.gambio.de
   Copyright (c) 2018 Gambio GmbH
   Released under the GNU General Public License (Version 2)
   [http://www.gnu.org/licenses/gpl-2.0.html]
   --------------------------------------------------------------
*/

namespace Gambio\AdminFeed\Services\ShopInformation\Serializer;

use Gambio\AdminFeed\Services\ShopInformation\ValueObjects\TemplateDetails;

/**
 * Class TemplateDetailsSerializer
 *
 * @package Gambio\AdminFeed\Services\ShopInformation\Serializer
 */
class TemplateDetailsSerializer
{
	/**
	 * Serializes a given TemplateDetails instance.
	 *
	 * @param \Gambio\AdminFeed\Services\ShopInformation\ValueObjects\TemplateDetails $templateDetails
	 *
	 * @return array
	 */
	public function serialize(TemplateDetails $templateDetails)
	{
		$json = [
			'available' => $templateDetails->available(),
			'selected'  => $templateDetails->selected(),
			'version'   => $templateDetails->version(),
		];
		
		return $json;
	}
	
	
	/**
	 * Returns a new TemplateDetails instance by using the data of a given array or json strings.
	 *
	 * @param string|array $json
	 *
	 * @return \Gambio\AdminFeed\Services\ShopInformation\ValueObjects\TemplateDetails
	 */
	public function deserialize($json)
	{
		if(!is_array($json))
		{
			$json = json_decode($json, true);
		}
		
		if(!isset($json['available'])
		   || !isset($json['selected'])
		   || !isset($json['version']))
		{
			throw new \InvalidArgumentException('Given argument is invalid. Needed property is missing.');
		}
		
		return TemplateDetails::create($json['available'], $json['selected'], $json['version']);
	}
}