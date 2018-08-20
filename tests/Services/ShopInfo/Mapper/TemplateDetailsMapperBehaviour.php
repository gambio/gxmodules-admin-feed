<?php
/* --------------------------------------------------------------
   TemplateDetailsMapperBehaviour.inc.php 2018-08-01
   Gambio GmbH
   http://www.gambio.de
   Copyright (c) 2018 Gambio GmbH
   Released under the GNU General Public License (Version 2)
   [http://www.gnu.org/licenses/gpl-2.0.html]
   --------------------------------------------------------------
*/

use Gambio\AdminFeed\Services\ShopInformation\Mapper\ServerDetailsMapper;
use Gambio\AdminFeed\Services\ShopInformation\Mapper\ShopDetailsMapper;
use Gambio\AdminFeed\Services\ShopInformation\Mapper\TemplateDetailsMapper;
use Gambio\AdminFeed\Services\ShopInformation\Reader\ServerDetailsReader;
use Gambio\AdminFeed\Services\ShopInformation\Reader\ShopDetailsReader;
use Gambio\AdminFeed\Services\ShopInformation\Reader\TemplateDetailsReader;
use Gambio\AdminFeed\Services\ShopInformation\ValueObjects\MysqlServerDetails;
use Gambio\AdminFeed\Services\ShopInformation\ValueObjects\PhpServerDetails;
use Gambio\AdminFeed\Services\ShopInformation\ValueObjects\ServerDetails;
use Gambio\AdminFeed\Services\ShopInformation\ValueObjects\ShopDetails;
use Gambio\AdminFeed\Services\ShopInformation\ValueObjects\TemplateDetails;
use PHPUnit\Framework\TestCase;

/**
 * Class TemplateDetailsMapperBehaviour
 */
class TemplateDetailsMapperBehaviour extends TestCase
{
	/**
	 * @var array
	 */
	private $available = ['Honeygrid', 'EyeCandy'];
	
	/**
	 * @var string
	 */
	private $selected = 'Honeygrid';
	
	/**
	 * @var string
	 */
	private $version = '3';
	
	
	/**
	 * @var \Gambio\AdminFeed\Services\ShopInformation\Reader\TemplateDetailsReader
	 */
	private $reader;
	
	/**
	 * @var \Gambio\AdminFeed\Services\ShopInformation\Mapper\TemplateDetailsMapper
	 */
	private $mapper;
	
	
	public function setUp()
	{
		$this->reader = $this->mockReader();
		
		$this->mapper = TemplateDetailsMapper::create($this->reader);
	}
	
	
	/**
	 * @test
	 */
	public function shouldReturnExpectedMerchantDetailsDetails()
	{
		$expectedDetails = $this->expectedTemplateDetails();
		
		$this->assertEquals($this->mapper->getTemplateDetails(), $expectedDetails);
	}
	
	
	private function expectedTemplateDetails()
	{
		return new TemplateDetails($this->available, $this->selected, $this->version);
	}
	
	
	private function mockReader()
	{
		$reader = $this->createMock(TemplateDetailsReader::class);
		$reader->method('getAvailableTemplates')->willReturn($this->available);
		$reader->method('getSelectedTemplate')->willReturn($this->selected);
		$reader->method('getSelectedTemplateVersion')->willReturn($this->version);
		
		return $reader;
	}
}