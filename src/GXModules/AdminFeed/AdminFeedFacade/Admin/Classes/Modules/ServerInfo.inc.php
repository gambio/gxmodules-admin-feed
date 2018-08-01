<?php
/* --------------------------------------------------------------
   ServerInfo.inc.php 2018-07-26
   Gambio GmbH
   http://www.gambio.de
   Copyright (c) 2018 Gambio GmbH
   Released under the GNU General Public License (Version 2)
   [http://www.gnu.org/licenses/gpl-2.0.html]
   --------------------------------------------------------------
*/

require_once(DIR_FS_CATALOG . 'gm/classes/JSON.php');

/**
 * Class AdminInfobox
 */
class ServerInfo
{
	/**
	 * Sends given server info and comment to Gambio.
	 *
	 * @param string $serverInfo
	 * @param string $comment
	 *
	 * @return bool
	 */
	public function send($serverInfo, $comment)
	{
		$t_url       = AdminFeedLinks::SERVER_INFO_SEND_URL;
		$t_post_data = 'server_info_array=' . urlencode($serverInfo) . '&comment=' . urlencode($comment);
		
		$t_success = false;
		
		if(function_exists('curl_init'))
		{
			$ch = curl_init($t_url);
			curl_setopt($ch, CURLOPT_POST, 1);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $t_post_data);
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
			curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt($ch, CURLOPT_VERBOSE, 0);
			curl_setopt($ch, CURLOPT_URL, $t_url);
			$t_response = curl_exec($ch);
			$t_response = trim($t_response);
			curl_close($ch);
			
			if($t_response == 'success')
			{
				$t_success = true;
			}
		}
		
		return $t_success;
	}
}
