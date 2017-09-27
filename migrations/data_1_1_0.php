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

class data_1_1_0 extends \phpbb\db\migration\migration
{
	public function effectively_installed()
	{
		return isset($this->config['ck_ve_active_global']);
	}

	static public function depends_on()
	{
		return array('\canonknipser\viewexif\migrations\ucp_1_1_0');
	}

	public function update_data()
	{
		return array(
			array('config.add', array('ck_ve_active_global', 1, true)),
			array('config.add', array('ck_ve_use_maps', 1, true)),
			array('config.add', array('ck_ve_version', '1.1.0', true)),
			array('config.add', array('ck_ve_allow_date', 1, true)),
			array('config.add', array('ck_ve_allow_focal_length', 1, true)),
			array('config.add', array('ck_ve_allow_exposure_time', 1, true)),
			array('config.add', array('ck_ve_allow_f_number', 1, true)),
			array('config.add', array('ck_ve_allow_iso', 1, true)),
			array('config.add', array('ck_ve_allow_wb', 1, true)),
			array('config.add', array('ck_ve_allow_flash', 1, true)),
			array('config.add', array('ck_ve_allow_make', 1, true)),
			array('config.add', array('ck_ve_allow_model', 1, true)),
			array('config.add', array('ck_ve_allow_exposure_prog', 1, true)),
			array('config.add', array('ck_ve_allow_exposure_bias', 1, true)),
			array('config.add', array('ck_ve_allow_metering', 1, true)),
			array('config.add', array('ck_ve_allow_gps', 1, true)),
		);
	}

}
