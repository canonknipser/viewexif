<?php
/**
 *
 * This file is part of the viewexif extension for phpBB.
 * @package View Exif
 * @copyright (c) 2017, canonknipser
 * @license GNU General Public License, version 2 (GPL-2.0)
 *
 */

namespace canonknipser\viewexif\acp;

/**
 * Viewexif ACP module info.
 */
class main_info
{
	function module()
	{
		return array(
			'filename'	=> '\canonknipser\viewexif\acp\main_module',
			'title'		=> 'ACP_CK_VE_TITLE',
			'modes'		=> array(
				'settings'	=> array(
					'title'	=> 'ACP_CK_VE',
					'auth'	=> 'ext_canonknipser/viewexif',
					'cat'	=> array('ACP_CK_VE_TITLE')
				),
			),
		);
	}
}
