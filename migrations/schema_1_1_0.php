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

class schema_1_1_0 extends \phpbb\db\migration\migration
{
	public function effectively_installed()
	{
		return $this->db_tools->sql_column_exists($this->table_prefix . 'users', 'ck_ve_mapservice');
	}

	static public function depends_on()
	{
		return array('\phpbb\db\migration\data\v31x\v316');
	}

	public function update_schema()
	{
		return array(
			'add_columns'	=> array(
				$this->table_prefix . 'users'			=> array(
					'ck_ve_mapservice'					=> array('VCHAR:255', 'googlemaps'),
					'ck_ve_active'						=> array('BOOL', true),
				),
				$this->table_prefix . 'forums'			=> array(
					'ck_ve_show'						=> array('BOOL', true),
				),
			),
		);
	}

	public function revert_schema()
	{
		return array(
			'drop_columns'	=> array(
				$this->table_prefix . 'users'			=> array(
					'ck_ve_mapservice',
					'ck_ve_active',
				),
				$this->table_prefix . 'forums'			=> array(
					'ck_ve_show',
				),
			),
		);
	}


}
