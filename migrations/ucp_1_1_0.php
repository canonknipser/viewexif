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

class ucp_1_1_0 extends \phpbb\db\migration\migration
{
	public function effectively_installed()
	{
		$sql = 'SELECT module_id
			FROM ' . $this->table_prefix . "modules
			WHERE module_class = 'ucp'
				AND module_langname = 'UCP_CK_VE_TITLE'";
		$result = $this->db->sql_query($sql);
		$module_id = $this->db->sql_fetchfield('module_id');
		$this->db->sql_freeresult($result);

		return $module_id !== false;
	}

	static public function depends_on()
	{
		return array('\canonknipser\viewexif\migrations\schema_1_1_0');
	}

	public function update_data()
	{
		return array(
			array('module.add', array(
				'ucp',
				0,
				'UCP_CK_VE_TITLE'
			)),
			array('module.add', array(
				'ucp',
				'UCP_CK_VE_TITLE',
				array(
					'module_basename'	=> '\canonknipser\viewexif\ucp\main_module',
					'modes'				=> array('settings'),
				),
			)),
		);
	}
}
