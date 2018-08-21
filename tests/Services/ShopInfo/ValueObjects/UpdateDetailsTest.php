<?php
/* --------------------------------------------------------------
   UpdateDetailsTest.inc.php 2018-08-01
   Gambio GmbH
   http://www.gambio.de
   Copyright (c) 2018 Gambio GmbH
   Released under the GNU General Public License (Version 2)
   [http://www.gnu.org/licenses/gpl-2.0.html]
   --------------------------------------------------------------
*/

use Gambio\AdminFeed\Services\ShopInformation\ValueObjects\UpdateDetails;
use PHPUnit\Framework\TestCase;

/**
 * Class UpdateDetailsTest
 */
class UpdateDetailsTest extends TestCase
{
	/**
	 * @var string
	 */
	private $name = 'AutoUpdater';
	
	/**
	 * @var string
	 */
	private $version = '2.0.5';
	
	/**
	 * @var string
	 */
	private $installationDate = '2018-01-01 00:00:00';
	
	
	/**
	 * @var \Gambio\AdminFeed\Services\ShopInformation\ValueObjects\UpdateDetails
	 */
	private $updateDetails;
	
	
	public function setUp()
	{
		$this->updateDetails = UpdateDetails::create($this->name, $this->version, $this->installationDate);
	}
	
	
	/**
	 * @test
	 */
	public function shouldReturnGivenName()
	{
		$this->assertSame($this->updateDetails->name(), $this->name);
	}
	
	
	/**
	 * @test
	 */
	public function shouldReturnGivenVersion()
	{
		$this->assertSame($this->updateDetails->version(), $this->version);
	}
	
	
	/**
	 * @test
	 */
	public function shouldReturnGivenInstallationDate()
	{
		$this->assertSame($this->updateDetails->installationDate(), $this->installationDate);
	}
}