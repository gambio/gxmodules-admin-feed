<?php
/* --------------------------------------------------------------
   TokenMapperTest.inc.php 2018-08-01
   Gambio GmbH
   http://www.gambio.de
   Copyright (c) 2018 Gambio GmbH
   Released under the GNU General Public License (Version 2)
   [http://www.gnu.org/licenses/gpl-2.0.html]
   --------------------------------------------------------------
*/

use Gambio\AdminFeed\Services\ShopInformation\Mapper\TokenMapper;
use Gambio\AdminFeed\Services\ShopInformation\Reader\TokenReader;
use Gambio\AdminFeed\Services\ShopInformation\Writer\TokenWriter;
use PHPUnit\Framework\TestCase;

/**
 * Class TokenMapperTest
 */
class TokenMapperTest extends TestCase
{
	/**
	 * @var array
	 */
	private $tokens;
	
	
	/**
	 * @var \Gambio\AdminFeed\Services\ShopInformation\Reader\TokenReader
	 */
	private $reader;
	
	/**
	 * @var \Gambio\AdminFeed\Services\ShopInformation\Writer\TokenWriter|PHPUnit\Framework\MockObject\MockObject
	 */
	private $writer;
	
	/**
	 * @var \Gambio\AdminFeed\Services\ShopInformation\Mapper\TokenMapper
	 */
	private $mapper;
	
	
	public function setUp()
	{
		$this->tokens = [uniqid(), uniqid(), uniqid()];
		
		$this->reader = $this->mockReader();
		$this->writer = $this->createMock(TokenWriter::class);
		
		$this->mapper = new TokenMapper($this->reader, $this->writer);
	}
	
	
	/**
	 * @test
	 */
	public function shouldReturnExpectedTokens()
	{
		$expectedTokens = $this->tokens;
		$actualTokens   = $this->mapper->getTokens();
		
		$this->assertSame($actualTokens, $expectedTokens);
	}
	
	
	/**
	 * @test
	 */
	public function shouldDeleteOldTokensBeforeReturningTokens()
	{
		$this->writer->expects($this->once())->method('deleteOldTokens');
		
		$expectedTokens = $this->tokens;
		$actualTokens   = $this->mapper->getTokens();
		
		$this->assertSame($actualTokens, $expectedTokens);
	}
	
	
	/**
	 * @test
	 */
	public function shouldAddGivenTokenByUsingTokenWriter()
	{
		$token = uniqid();
		
		$this->writer->expects($this->once())->method('addToken')->with($this->equalTo($token));
		
		$this->mapper->addToken($token);
	}
	
	
	private function mockReader()
	{
		$tokensData = [];
		foreach($this->tokens as $token)
		{
			$tokensData[] = [
				'timestamp' => time(),
				'token'     => $token,
			];
		}
		
		$reader = $this->createMock(TokenReader::class);
		$reader->method('getTokensData')->willReturn($tokensData);
		
		return $reader;
	}
}