<?php
/* --------------------------------------------------------------
   UpdateDetailsRepositoryBehaviour.inc.php 2018-08-01
   Gambio GmbH
   http://www.gambio.de
   Copyright (c) 2018 Gambio GmbH
   Released under the GNU General Public License (Version 2)
   [http://www.gnu.org/licenses/gpl-2.0.html]
   --------------------------------------------------------------
*/

use Gambio\AdminFeed\Services\ShopInformation\Repositories\UpdateDetailsRepository;
use PHPUnit\Framework\TestCase;

/**
 * Class UpdateDetailsRepositoryBehaviour
 */
class UpdateDetailsRepositoryBehaviour extends TestCase
{
	/**
	 * @var array
	 */
	private $repository;
	
	
	public function setUp()
	{
		$this->repository = UpdateDetailsRepository::create();
	}
	
	
	/**
	 * @test
	 */
	public function shouldReturnGivenUsermods()
	{
		$this->assertEquals($this->fileSystemDetails->usermods(), $this->usermods);
	}
}