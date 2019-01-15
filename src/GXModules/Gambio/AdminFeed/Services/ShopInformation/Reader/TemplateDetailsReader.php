<?php
/* --------------------------------------------------------------
   TemplateDetailsReader.php 2019-01-15
   Gambio GmbH
   http://www.gambio.de
   Copyright (c) 2019 Gambio GmbH
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
			return 'templates/' . basename($template);
		}, $templates);
		
		$themes = (array)glob($this->settings->getBaseDirectory() . 'themes/*', GLOB_ONLYDIR);
		$themes = array_map(function ($theme) {
			return 'themes/' . basename($theme);
		}, $themes);
		
		return array_merge($templates, $themes);
	}
	
	
	/**
	 * Returns the name of the active template.
	 *
	 * @return string
	 */
	public function getActiveTemplate()
	{
		$activeTemplate = 'templates/' . $this->settings->getActiveTemplate();
		
		if($this->settings->areThemesAvailable())
		{
			/* @var \ThemeControl $themeControl */
			$themeControl = $this->gxAdapter()->getThemeControl();
			$activeTemplate = $themeControl->isThemeSystemActive() ? 'themes/' : 'templates/';
			$activeTemplate .= $themeControl->getCurrentTheme();
		}
		
		return $activeTemplate;
	}
	
	
	/**
	 * Returns the version of the active template.
	 *
	 * @return string
	 */
	public function getActiveTemplateVersion()
	{
		$activeTemplateVersion = $this->settings->getActiveTemplateVersion();
		
		if($this->settings->areThemesAvailable())
		{
			/* @var \ThemeControl $themeControl */
			$themeControl = $this->gxAdapter()->getThemeControl();
			$activeTemplateVersion = $themeControl->getThemeVersion();
		}
		
		return $activeTemplateVersion;
	}
}