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
 * Viewexif Entry ACP module.
 */
class main_module
{
	public $u_action;
	public $tpl_name;
	public $page_title;

	function main($id, $mode)
	{
		global $user, $template, $request, $config;
		$this->tpl_name = 'acp_viewexif_body';
		$this->page_title = $user->lang('ACP_CK_VE_TITLE');
		add_form_key('canonknipser/acp_viewexif');

		if ($request->is_set_post('submit'))
		{
			if (!check_form_key('canonknipser/acp_viewexif'))
			{
				trigger_error($user->lang('FORM_INVALID'));
			}

			$config->set('ck_ve_active_global', $request->variable('ck_ve_active_global', 1));
			$config->set('ck_ve_use_maps', $request->variable('ck_ve_use_maps', 1));
			$config->set('ck_ve_allow_date', $request->variable('ck_ve_allow_date', 1));
			$config->set('ck_ve_allow_focal_length', $request->variable('ck_ve_allow_focal_length', 1));
			$config->set('ck_ve_allow_exposure_time', $request->variable('ck_ve_allow_exposure_time', 1));
			$config->set('ck_ve_allow_f_number', $request->variable('ck_ve_allow_f_number', 1));
			$config->set('ck_ve_allow_iso', $request->variable('ck_ve_allow_iso', 1));
			$config->set('ck_ve_allow_wb', $request->variable('ck_ve_allow_wb', 1));
			$config->set('ck_ve_allow_flash', $request->variable('ck_ve_allow_flash', 1));
			$config->set('ck_ve_allow_make', $request->variable('ck_ve_allow_make', 1));
			$config->set('ck_ve_allow_model', $request->variable('ck_ve_allow_model', 1));
			$config->set('ck_ve_allow_exposure_prog', $request->variable('ck_ve_allow_exposure_prog', 1));
			$config->set('ck_ve_allow_exposure_bias', $request->variable('ck_ve_allow_exposure_bias', 1));
			$config->set('ck_ve_allow_metering', $request->variable('ck_ve_allow_metering', 1));
			$config->set('ck_ve_allow_gps', $request->variable('ck_ve_allow_gps', 1));
			$message = $user->lang('ACP_CK_VE_SAVED') . '<br /><br />' .adm_back_link($this->u_action);
			trigger_error($message);
		}

		$template->assign_vars(array(
			'S_CK_VE_ACTIVE'				=> $config['ck_ve_active_global'],
			'S_CK_VE_USE_MAPS'				=> $config['ck_ve_use_maps'],
			'CK_VE_VERSION'					=> $config['ck_ve_version'],
			'S_CK_VE_ALLOW_DATE'			=> $config['ck_ve_allow_date'],
			'S_CK_VE_ALLOW_FOCAL_LENGTH'	=> $config['ck_ve_allow_focal_length'],
			'S_CK_VE_ALLOW_EXPOSURE_TIME'	=> $config['ck_ve_allow_exposure_time'],
			'S_CK_VE_ALLOW_F_NUMBER'		=> $config['ck_ve_allow_f_number'],
			'S_CK_VE_ALLOW_ISO'				=> $config['ck_ve_allow_iso'],
			'S_CK_VE_ALLOW_WB'				=> $config['ck_ve_allow_wb'],
			'S_CK_VE_ALLOW_FLASH'			=> $config['ck_ve_allow_flash'],
			'S_CK_VE_ALLOW_MAKE'			=> $config['ck_ve_allow_make'],
			'S_CK_VE_ALLOW_MODEL'			=> $config['ck_ve_allow_model'],
			'S_CK_VE_ALLOW_EXPOSURE_PROG'	=> $config['ck_ve_allow_exposure_prog'],
			'S_CK_VE_ALLOW_EXPOSURE_BIAS'	=> $config['ck_ve_allow_exposure_bias'],
			'S_CK_VE_ALLOW_METERING'		=> $config['ck_ve_allow_metering'],
			'S_CK_VE_ALLOW_GPS'				=> $config['ck_ve_allow_gps'],
			'S_ACP_ACTION'					=> $this->u_action,
		));
	}
}
