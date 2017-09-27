<?php
/**
 *
 * This file is part of the viewexif extension for phpBB.
 * @package View Exif
 * @copyright (c) 2017, canonknipser
 * @license GNU General Public License, version 2 (GPL-2.0)
 *
 */

namespace canonknipser\viewexif\ucp;

/**
 * Viewexif Entry UCP module.
 */
class main_module
{
	var $u_action;

	function main($id, $mode)
	{
		global $db, $request, $template, $user;

		$this->tpl_name = 'ucp_viewexif_body';
		$this->page_title = $user->lang('UCP_CK_VE_TITLE');
		add_form_key('canonknipser/ucp_viewexif');

		$data = array(
			'ck_ve_mapservice' => $request->variable('ck_ve_mapservice', $user->data['ck_ve_mapservice']),
			'ck_ve_active' => $request->variable('ck_ve_active', (bool) $user->data['ck_ve_active']),
		);

		$s_mapservice_options = '<option value="googlemaps"' . (($data['ck_ve_mapservice'] == 'googlemaps') ? ' selected="selected"' : '') . '>'.$user->lang('UCP_CK_VE_GOOGLEMAPS').'</option>';
		$s_mapservice_options .= '<option value="osm"' . (($data['ck_ve_mapservice'] == 'osm') ? ' selected="selected"' : '') . '>'.$user->lang('UCP_CK_VE_OSM').'</option>';

		if ($request->is_set_post('submit'))
		{
			if (!check_form_key('canonknipser/ucp_viewexif'))
			{
				trigger_error($user->lang('FORM_INVALID'));
			}

			$sql = 'UPDATE ' . USERS_TABLE . '
				SET ' . $db->sql_build_array('UPDATE', $data) . '
				WHERE user_id = ' . (int) $user->data['user_id'];
			$db->sql_query($sql);

			meta_refresh(3, $this->u_action);
			$message = $user->lang('UCP_CK_VE_SAVED') . '<br /><br />' . $user->lang('RETURN_UCP', '<a href="' . $this->u_action . '">', '</a>');
			trigger_error($message);
		}

		$template->assign_vars(array(
			'S_CK_VE_USER_MAPSERVICE'	=> $s_mapservice_options,
			'S_CK_VE_ACTIVE'			=> $data['ck_ve_active'],
			'S_UCP_ACTION'				=> $this->u_action,
		));
	}
}
