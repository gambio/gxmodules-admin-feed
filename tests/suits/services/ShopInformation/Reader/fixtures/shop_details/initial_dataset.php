<?php
/* --------------------------------------------------------------
   InitialDataSet.php 2018-08-09
   Gambio GmbH
   http://www.gambio.de
   Copyright (c) 2018 Gambio GmbH
   Released under the GNU General Public License (Version 2)
   [http://www.gnu.org/licenses/gpl-2.0.html]
   --------------------------------------------------------------
*/

return [
	'countries'     => [
		[
			'countries_id'         => '1',
			'countries_name'       => 'Afghanistan',
			'countries_iso_code_2' => 'AF',
			'countries_iso_code_3' => 'AFG',
			'address_format_id'    => '1',
			'status'               => '0',
			'is_state_mandatory'   => '0',
		],
		[
			'countries_id'         => '14',
			'countries_name'       => 'Austria',
			'countries_iso_code_2' => 'AT',
			'countries_iso_code_3' => 'AUT',
			'address_format_id'    => '5',
			'status'               => '1',
			'is_state_mandatory'   => '0',
		],
		[
			'countries_id'         => '81',
			'countries_name'       => 'Germany',
			'countries_iso_code_2' => 'DE',
			'countries_iso_code_3' => 'DEU',
			'address_format_id'    => '5',
			'status'               => '1',
			'is_state_mandatory'   => '0',
		],
		[
			'countries_id'         => '204',
			'countries_name'       => 'Switzerland',
			'countries_iso_code_2' => 'CH',
			'countries_iso_code_3' => 'CHE',
			'address_format_id'    => '5',
			'status'               => '1',
			'is_state_mandatory'   => '0',
		],
	],
	'languages'     => [
		[
			'languages_id'     => '1',
			'name'             => 'English',
			'code'             => 'en',
			'image'            => 'icon.gif',
			'directory'        => 'english',
			'sort_order'       => '2',
			'language_charset' => 'utf-8',
			'status'           => '1',
		],
		[
			'languages_id'     => '2',
			'name'             => 'Deutsch',
			'code'             => 'de',
			'image'            => 'icon.gif',
			'directory'        => 'german',
			'sort_order'       => '1',
			'language_charset' => 'utf-8',
			'status'           => '1',
		],
		[
			'languages_id'     => '3',
			'name'             => 'France',
			'code'             => 'fr',
			'image'            => 'icon.gif',
			'directory'        => 'france',
			'sort_order'       => '3',
			'language_charset' => 'utf-8',
			'status'           => '0',
		],
	],
];