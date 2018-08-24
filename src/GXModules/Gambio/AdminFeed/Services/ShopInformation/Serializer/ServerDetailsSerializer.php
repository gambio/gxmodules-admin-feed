<?php
/* --------------------------------------------------------------
   ServerDetailsSerializer.php 2018-08-01
   Gambio GmbH
   http://www.gambio.de
   Copyright (c) 2018 Gambio GmbH
   Released under the GNU General Public License (Version 2)
   [http://www.gnu.org/licenses/gpl-2.0.html]
   --------------------------------------------------------------
*/

namespace Gambio\AdminFeed\Services\ShopInformation\Serializer;

use Gambio\AdminFeed\Services\ShopInformation\ValueObjects\ServerDetails;

/**
 * Class ServerDetailsSerializer
 *
 * @package Gambio\AdminFeed\Services\ShopInformation\Serializer
 */
class ServerDetailsSerializer
{
	/**
	 * @var \Gambio\AdminFeed\Services\ShopInformation\Serializer\PhpServerDetailsSerializer
	 */
	private $phpServerDetailsSerializer;
	
	/**
	 * @var \Gambio\AdminFeed\Services\ShopInformation\Serializer\MysqlServerDetailsSerializer
	 */
	private $mysqlServerDetailsSerializer;
	
	
	/**
	 * ServerDetailsSerializer constructor.
	 *
	 * @param \Gambio\AdminFeed\Services\ShopInformation\Serializer\PhpServerDetailsSerializer   $phpServerDetailsSerializer
	 * @param \Gambio\AdminFeed\Services\ShopInformation\Serializer\MysqlServerDetailsSerializer $mysqlServerDetailsSerializer
	 */
	public function __construct(PhpServerDetailsSerializer $phpServerDetailsSerializer,
	                            MysqlServerDetailsSerializer $mysqlServerDetailsSerializer)
	{
		$this->phpServerDetailsSerializer   = $phpServerDetailsSerializer;
		$this->mysqlServerDetailsSerializer = $mysqlServerDetailsSerializer;
	}
	
	
	/**
	 * @param \Gambio\AdminFeed\Services\ShopInformation\ValueObjects\ServerDetails $serverDetails
	 *
	 * @return array
	 */
	public function serialize(ServerDetails $serverDetails)
	{
		$json = [
			'php'       => $this->phpServerDetailsSerializer->serialize($serverDetails->php()),
			'mysql'     => $this->mysqlServerDetailsSerializer->serialize($serverDetails->mysql()),
			'webserver' => $serverDetails->webserver(),
			'os'        => $serverDetails->os(),
		];
		
		return $json;
	}
	
	
	/**
	 * @param string|array $json
	 *
	 * @return \Gambio\AdminFeed\Services\ShopInformation\ValueObjects\ServerDetails
	 */
	public function deserialize($json)
	{
		if(!is_array($json))
		{
			$json = json_decode($json, true);
		}
		
		if(!isset($json['php'])
		   || !isset($json['mysql'])
		   || !isset($json['webserver'])
		   || !isset($json['os']))
		{
			throw new \InvalidArgumentException('Given argument is invalid. Needed property is missing.');
		}
		
		$php   = $this->phpServerDetailsSerializer->deserialize($json['php']);
		$mysql = $this->mysqlServerDetailsSerializer->deserialize($json['mysql']);
		
		return ServerDetails::create($php, $mysql, $json['webserver'], $json['os']);
	}
}