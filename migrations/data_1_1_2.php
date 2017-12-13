<?php
/**
 *
 * This file is part of the viewexif extension for phpBB.
 * @package View Exif
 * @copyright (c) 2017, canonknipser
 * @license GNU General Public License, version 2 (GPL-2.0)
 *
 */

namespace canonknipser\viewexif\migrations;

class data_1_1_2 extends \phpbb\db\migration\migration
{
	static public function depends_on()
	{
		return array('\canonknipser\viewexif\migrations\data_1_1_1');
	}

	public function update_data()
	{
		return array(
			array('config.update', array('ck_ve_version', '1.1.2')),
		);
	}

}
