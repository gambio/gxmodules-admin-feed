<?php
/* --------------------------------------------------------------
   FileSystemDetailsSerializer.php 2018-08-01
   Gambio GmbH
   http://www.gambio.de
   Copyright (c) 2018 Gambio GmbH
   Released under the GNU General Public License (Version 2)
   [http://www.gnu.org/licenses/gpl-2.0.html]
   --------------------------------------------------------------
*/

namespace Gambio\AdminFeed\Services\ShopInformation\Serializer;

use Gambio\AdminFeed\Services\ShopInformation\ValueObjects\FileSystemDetails;

/**
 * Class FileSystemDetailsSerializer
 *
 * @package Gambio\AdminFeed\Services\ShopInformation\Serializer
 */
class FileSystemDetailsSerializer
{
	/**
	 * @param \Gambio\AdminFeed\Services\ShopInformation\ValueObjects\FileSystemDetails $fileSystemDetails
	 *
	 * @return array
	 */
	public function serialize(FileSystemDetails $fileSystemDetails)
	{
		$json = [
			'usermods'                     => $fileSystemDetails->usermods(),
			'gxModules'                    => $fileSystemDetails->gxModules(),
			'dangerousTools'               => $fileSystemDetails->dangerousTools(),
			'receiptFiles'                 => $fileSystemDetails->receiptFiles(),
			'globalUsermodDirectoryExists' => $fileSystemDetails->globalUsermodDirectoryExists(),
			'upmDirectoryExists'           => $fileSystemDetails->upmDirectoryExists(),
		];
		
		return $json;
	}
	
	
	/**
	 * @param string|array $json
	 *
	 * @return \Gambio\AdminFeed\Services\ShopInformation\ValueObjects\FileSystemDetails
	 */
	public function deserialize($json)
	{
		if(!is_array($json))
		{
			$json = json_decode($json, true);
		}
		
		if(!isset($json['usermods'])
		   || !isset($json['gxModules'])
		   || !isset($json['dangerousTools'])
		   || !isset($json['receiptFiles'])
		   || !isset($json['globalUsermodDirectoryExists'])
		   || !isset($json['upmDirectoryExists']))
		{
			throw new \InvalidArgumentException('Given argument is invalid. Needed property is missing.');
		}
		
		return FileSystemDetails::create($json['usermods'], $json['gxModules'], $json['dangerousTools'],
		                                 $json['receiptFiles'], $json['globalUsermodDirectoryExists'],
		                                 $json['upmDirectoryExists']);
	}
}