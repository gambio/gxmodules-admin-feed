<?php
/* --------------------------------------------------------------
   UpdatesDetailsTest.inc.php 2018-08-01
   Gambio GmbH
   http://www.gambio.de
   Copyright (c) 2018 Gambio GmbH
   Released under the GNU General Public License (Version 2)
   [http://www.gnu.org/licenses/gpl-2.0.html]
   --------------------------------------------------------------
*/

use Gambio\AdminFeed\Services\ShopInformation\Collections\UpdateDetailsCollection;
use Gambio\AdminFeed\Services\ShopInformation\ValueObjects\UpdateDetails;
use Gambio\AdminFeed\Services\ShopInformation\ValueObjects\UpdatesDetails;
use PHPUnit\Framework\TestCase;

/**
 * Class UpdatesDetailsTest
 */
class UpdatesDetailsTest extends TestCase
{
	/**
	 * @var \Gambio\AdminFeed\Services\ShopInformation\Collections\UpdateDetailsCollection
	 */
	private $installed;
	
	/**
	 * @var \Gambio\AdminFeed\Services\ShopInformation\Collections\UpdateDetailsCollection
	 */
	private $downloaded;
	
	
	/**
	 * @var \Gambio\AdminFeed\Services\ShopInformation\ValueObjects\UpdatesDetails
	 */
	private $updatesDetails;
	
	
	#[\Override]
 public function setUp()
	{
		$this->installed  = $this->createMock(UpdateDetailsCollection::class);
		$this->downloaded = $this->createMock(UpdateDetailsCollection::class);
		
		$this->updatesDetails = UpdatesDetails::create($this->installed, $this->downloaded);
	}
	
	
	/**
	 * @test
	 */
	public function shouldReturnGivenInstalledUpdates(): void
	{
		$this->assertSame($this->updatesDetails->installed(), $this->installed);
	}
	
	
	/**
	 * @test
	 */
	public function shouldReturnGivenDownloadedUpdates(): void
	{
		$this->assertSame($this->updatesDetails->downloaded(), $this->downloaded);
	}
}