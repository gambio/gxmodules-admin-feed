<?php
/* --------------------------------------------------------------
   TokenMapper.php 2018-08-01
   Gambio GmbH
   http://www.gambio.de
   Copyright (c) 2018 Gambio GmbH
   Released under the GNU General Public License (Version 2)
   [http://www.gnu.org/licenses/gpl-2.0.html]
   --------------------------------------------------------------
*/

namespace Gambio\AdminFeed\Services\ShopInformation\Mapper;

use Gambio\AdminFeed\Services\ShopInformation\Reader\TokenReader;
use Gambio\AdminFeed\Services\ShopInformation\Writer\TokenWriter;

/**
 * Class TokenMapper
 *
 * @package Gambio\AdminFeed\Services\ShopInformation\Mapper
 */
class TokenMapper
{
	/**
	 * @var \Gambio\AdminFeed\Services\ShopInformation\Mapper\TokenReader
	 */
	private $reader;
	
	/**
	 * @var \Gambio\AdminFeed\Services\ShopInformation\Mapper\TokenWriter
	 */
	private $writer;
	
	
	/**
	 * FileSystemDetailsMapper constructor.
	 *
	 * @param \Gambio\AdminFeed\Services\ShopInformation\Reader\TokenReader $reader
	 * @param \Gambio\AdminFeed\Services\ShopInformation\Writer\TokenWriter $writer
	 */
	public function __construct(TokenReader $reader, TokenWriter $writer)
	{
		$this->reader = $reader;
		$this->writer = $writer;
	}
	
	
	/**
	 * @return array
	 */
	public function getTokens()
	{
		$token = [];
		
		$this->writer->deleteOldTokens();
		$tokensData = $this->reader->getTokensData();
		
		if(is_array($tokensData) && count($tokensData) > 0)
		{
			foreach($tokensData as $tokenData)
			{
				$token[] = $tokenData['token'];
			}
		}
		
		return $token;
	}
	
	
	/**
	 * @param string $token
	 */
	public function addToken($token)
	{
		$this->writer->addToken($token);
	}
}