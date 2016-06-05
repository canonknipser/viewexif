<?php
/**
 *
 * This file is part of the phpBB Forum Software package.
 *
 * @copyright (c) phpBB Limited <https://www.phpbb.com>
 * @license GNU General Public License, version 2 (GPL-2.0)
 *
 * For full copyright and license information, please see
 * the docs/CREDITS.txt file.
 *
 */

if (!defined('IN_PHPBB'))
{
	exit;
}

if (empty($lang) || !is_array($lang))
{
	$lang = array();
}

$lang = array_merge($lang, array(
	'CK_VE_EXIF_CAPTION'				=> 'EXIF-Data',
	'CK_VE_EXIF_APERTURE'			=> 'F-number',
	'CK_VE_EXIF_CAM_MODEL'			=> 'Camera-model',
	'CK_VE_EXIF_CAM_MAKE'			=> 'Camera-manufacturer',
	'CK_VE_EXIF_DATE'				=> 'Image taken on',

	'CK_VE_EXIF_EXPOSURE'			=> 'Shutter speed',
	'CK_VE_EXIF_EXPOSURE_EXP'		=> '%s Sec',// 'CK_VE_EXIF_EXPOSURE' unit
	'CK_VE_EXIF_EXPOSURE_BIAS'		=> 'Exposure bias',
	'CK_VE_EXIF_EXPOSURE_BIAS_EXP'	=> '%s EV',// 'CK_VE_EXIF_EXPOSURE_BIAS' unit
	'CK_VE_EXIF_EXPOSURE_PROG'		=> 'Exposure program',
	'CK_VE_EXIF_EXPOSURE_PROG_0'	=> 'Not defined',
	'CK_VE_EXIF_EXPOSURE_PROG_1'	=> 'Manual',
	'CK_VE_EXIF_EXPOSURE_PROG_2'	=> 'Normal program',
	'CK_VE_EXIF_EXPOSURE_PROG_3'	=> 'Aperture priority',
	'CK_VE_EXIF_EXPOSURE_PROG_4'	=> 'Shutter priority',
	'CK_VE_EXIF_EXPOSURE_PROG_5'	=> 'Creative program (biased toward depth of field)',
	'CK_VE_EXIF_EXPOSURE_PROG_6'	=> 'Action program (biased toward fast shutter speed)',
	'CK_VE_EXIF_EXPOSURE_PROG_7'	=> 'Portrait mode (for closeup photos with the background out of focus)',
	'CK_VE_EXIF_EXPOSURE_PROG_8'	=> 'Landscape mode (for landscape photos with the background in focus)',

	'CK_VE_EXIF_FLASH'				=> 'Flash',

	'CK_VE_EXIF_FLASH_CASE_0'		=> 'Flash did not fire',
	'CK_VE_EXIF_FLASH_CASE_1'		=> 'Flash fired',
	'CK_VE_EXIF_FLASH_CASE_5'		=> 'return light not detected',
	'CK_VE_EXIF_FLASH_CASE_7'		=> 'return light detected',
	'CK_VE_EXIF_FLASH_CASE_8'		=> 'On, Flash did not fire',
	'CK_VE_EXIF_FLASH_CASE_9'		=> 'Flash fired, compulsory flash mode',
	'CK_VE_EXIF_FLASH_CASE_13'		=> 'Flash fired, compulsory flash mode, return light not detected',
	'CK_VE_EXIF_FLASH_CASE_15'		=> 'Flash fired, compulsory flash mode, return light detected',
	'CK_VE_EXIF_FLASH_CASE_16'		=> 'Flash did not fire, compulsory flash mode',
	'CK_VE_EXIF_FLASH_CASE_20'		=> 'Off, Flash did not fire, return light not detected',
	'CK_VE_EXIF_FLASH_CASE_24'		=> 'Flash did not fire, auto mode',
	'CK_VE_EXIF_FLASH_CASE_25'		=> 'Flash fired, auto mode',
	'CK_VE_EXIF_FLASH_CASE_29'		=> 'Flash fired, auto mode, return light not detected',
	'CK_VE_EXIF_FLASH_CASE_31'		=> 'Flash fired, auto mode, return light detected',
	'CK_VE_EXIF_FLASH_CASE_32'		=> 'No flash function',
	'CK_VE_EXIF_FLASH_CASE_48'		=> 'Off, No flash function',
	'CK_VE_EXIF_FLASH_CASE_65'		=> 'Flash fired, red-eye reduction mode',
	'CK_VE_EXIF_FLASH_CASE_69'		=> 'Flash fired, red-eye reduction mode, return light not detected',
	'CK_VE_EXIF_FLASH_CASE_71'		=> 'Flash fired, red-eye reduction mode, return light detected',
	'CK_VE_EXIF_FLASH_CASE_73'		=> 'Flash fired, compulsory flash mode, red-eye reduction mode',
	'CK_VE_EXIF_FLASH_CASE_77'		=> 'Flash fired, compulsory flash mode, red-eye reduction mode, return light not detected',
	'CK_VE_EXIF_FLASH_CASE_79'		=> 'Flash fired, compulsory flash mode, red-eye reduction mode, return light detected',
	'CK_VE_EXIF_FLASH_CASE_80'		=> 'Off, Red-eye reduction',
	'CK_VE_EXIF_FLASH_CASE_88'		=> 'Auto, Did not fire, Red-eye reduction',
	'CK_VE_EXIF_FLASH_CASE_89'		=> 'Flash fired, auto mode, red-eye reduction mode',
	'CK_VE_EXIF_FLASH_CASE_93'		=> 'Flash fired, auto mode, return light not detected, red-eye reduction mode',
	'CK_VE_EXIF_FLASH_CASE_95'		=> 'Flash fired, auto mode, return light detected, red-eye reduction mode',

	'CK_VE_EXIF_FOCAL'				=> 'Focus length',
	'CK_VE_EXIF_FOCAL_EXP'			=> '%s mm',// 'CK_VE_EXIF_FOCAL' unit

	'CK_VE_EXIF_ISO'				=> 'ISO speed rating',

	'CK_VE_EXIF_METERING_MODE'		=> 'Metering mode',
	'CK_VE_EXIF_METERING_MODE_0'	=> 'Unknown',
	'CK_VE_EXIF_METERING_MODE_1'	=> 'Average',
	'CK_VE_EXIF_METERING_MODE_2'	=> 'Center-weighted average',
	'CK_VE_EXIF_METERING_MODE_3'	=> 'Spot',
	'CK_VE_EXIF_METERING_MODE_4'	=> 'Multi-Spot',
	'CK_VE_EXIF_METERING_MODE_5'	=> 'Pattern',
	'CK_VE_EXIF_METERING_MODE_6'	=> 'Partial',
	'CK_VE_EXIF_METERING_MODE_255'	=> 'Other',

	'CK_VE_EXIF_NOT_AVAILABLE'		=> 'not available',

	'CK_VE_EXIF_WHITEB'				=> 'Whitebalance',
	'CK_VE_EXIF_WHITEB_AUTO'		=> 'Auto',
	'CK_VE_EXIF_WHITEB_MANU'		=> 'Manual',

	'CK_VE_SHOW_EXIF'				=> 'show/hide',
	'CK_VE_CLICK_HERE'				=> 'Click here',
	'CK_VE_NAME_MAPSERVICE'			=> 'Google Maps'
));
