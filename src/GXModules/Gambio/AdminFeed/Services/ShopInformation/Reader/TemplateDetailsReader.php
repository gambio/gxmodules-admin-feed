<?php
/* --------------------------------------------------------------
   TemplateDetailsReader.php 2018-08-01
   Gambio GmbH
   http://www.gambio.de
   Copyright (c) 2018 Gambio GmbH
   Released under the GNU General Public License (Version 2)
   [http://www.gnu.org/licenses/gpl-2.0.html]
   --------------------------------------------------------------
*/

namespace Gambio\AdminFeed\Services\ShopInformation\Reader;

use Gambio\AdminFeed\Adapters\GxAdapterTrait;
use Gambio\AdminFeed\Services\ShopInformation\Settings;

/**
 * Class TemplateDetailsReader
 *
 * @package Gambio\AdminFeed\Services\ShopInformation\Reader
 */
class TemplateDetailsReader
{
	use GxAdapterTrait;
	
	/**
	 * @var \Gambio\AdminFeed\Services\ShopInformation\Settings
	 */
	private $settings;
	
	
	/**
	 * TemplateDetailsReader constructor.
	 *
	 * @param \Gambio\AdminFeed\Services\ShopInformation\Settings $settings
	 */
	public function __construct(Settings $settings)
	{
		$this->settings = $settings;
	}
	
	
	/**
	 * Returns a list of available templates.
	 *
	 * @return array
	 */
	public function getAvailableTemplates()
	{
		$templates = (array)glob($this->settings->getBaseDirectory() . 'templates/*', GLOB_ONLYDIR);
		$templates = array_map(function ($template) {
			return basename($template);
		}, $templates);
		
		return $templates;
	}
	
	
	/**
	 * Returns the name of the active template.
	 *
	 * @return string
	 */
	public function getActiveTemplate()
	{
		return $this->settings->getActiveTemplate();
	}
	
	
	/**
	 * Returns the version of the active template.
	 *
	 * @return string
	 */
	public function getActiveTemplateVersion()
	{
		return $this->settings->getActiveTemplateVersion();
	}
}