<?php
/* --------------------------------------------------------------
   TokenRepositoryTest.inc.php 2018-08-01
   Gambio GmbH
   http://www.gambio.de
   Copyright (c) 2018 Gambio GmbH
   Released under the GNU General Public License (Version 2)
   [http://www.gnu.org/licenses/gpl-2.0.html]
   --------------------------------------------------------------
*/

use Gambio\AdminFeed\Services\ShopInformation\Mapper\TokenMapper;
use Gambio\AdminFeed\Services\ShopInformation\Repositories\TokenRepository;
use PHPUnit\Framework\TestCase;

/**
 * Class TokenRepositoryTest
 */
class TokenRepositoryTest extends TestCase
{
	/**
	 * @var array
	 */
	private $tokens;
	
	/**
	 * @var \Gambio\AdminFeed\Services\ShopInformation\Mapper\TokenMapper|\PHPUnit\Framework\MockObject\MockObject
	 */
	private $mapper;
	
	/**
	 * @var \Gambio\AdminFeed\Services\ShopInformation\Repositories\TokenRepository
	 */
	private $repository;
	
	
	public function setUp()
	{
		$this->tokens = [uniqid(), uniqid(), uniqid()];
		
		$this->mapper = $this->createMock(TokenMapper::class);
		$this->mapper->method('getTokens')->willReturn($this->tokens);
		
		$this->repository = new TokenRepository($this->mapper);
	}
	
	
	/**
	 * @test
	 */
	public function shouldSuccessfullyVerifyValidToken()
	{
		$token = $this->tokens[2];
		
		$this->assertTrue($this->repository->verifyToken($token));
	}
	
	
	/**
	 * @test
	 */
	public function shouldFailToVerifyInvalidToken()
	{
		$token = uniqid();
		
		$this->assertFalse($this->repository->verifyToken($token));
	}
	
	
	/**
	 * @test
	 */
	public function shouldAddGivenTokenByUsingTokenMapper()
	{
		$token = uniqid();
		
		$this->mapper->expects($this->once())->method('addToken')->with($this->equalTo($token));
		
		$this->repository->addToken($token);
	}
}