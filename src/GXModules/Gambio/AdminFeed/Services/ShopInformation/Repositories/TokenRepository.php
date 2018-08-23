<?php
/* --------------------------------------------------------------
   TokenRepository.php 2018-08-01
   Gambio GmbH
   http://www.gambio.de
   Copyright (c) 2018 Gambio GmbH
   Released under the GNU General Public License (Version 2)
   [http://www.gnu.org/licenses/gpl-2.0.html]
   --------------------------------------------------------------
*/

namespace Gambio\AdminFeed\Services\ShopInformation\Repositories;

use Gambio\AdminFeed\Services\ShopInformation\Mapper\TokenMapper;

/**
 * Interface TokenRepository
 *
 * @package Gambio\AdminFeed\Services\ShopInformation\Repositories\Interfaces
 */
class TokenRepository
{
	/**
	 * @var \Gambio\AdminFeed\Services\ShopInformation\Mapper\TokenMapper
	 */
	private $mapper;
	
	
	/**
	 * TokenRepository constructor.
	 *
	 * @param \Gambio\AdminFeed\Services\ShopInformation\Mapper\TokenMapper $mapper
	 */
	public function __construct(TokenMapper $mapper)
	{
		$this->mapper = $mapper;
	}
	
	
	/**
	 * @param string $token
	 *
	 * @return bool
	 */
	public function verifyToken($token)
	{
		$availableTokens = $this->mapper->getTokens();
		
		return in_array($token, $availableTokens);
	}
	
	
	/**
	 * @param string $token
	 */
	public function addToken($token)
	{
		$this->mapper->addToken($token);
	}
}