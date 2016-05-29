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
	'VIEWEXIF_EXIF_CAPTION'				=> 'EXIF-Data',
	'VIEWEXIF_EXIF_APERTURE'			=> 'F-number',
	'VIEWEXIF_EXIF_CAM_MODEL'			=> 'Camera-model',
	'VIEWEXIF_EXIF_DATE'				=> 'Image taken on',

	'VIEWEXIF_EXIF_EXPOSURE'			=> 'Shutter speed',
	'VIEWEXIF_EXIF_EXPOSURE_EXP'		=> '%s Sec',// 'VIEWEXIF_EXIF_EXPOSURE' unit
	'VIEWEXIF_EXIF_EXPOSURE_BIAS'		=> 'Exposure bias',
	'VIEWEXIF_EXIF_EXPOSURE_BIAS_EXP'	=> '%s EV',// 'VIEWEXIF_EXIF_EXPOSURE_BIAS' unit
	'VIEWEXIF_EXIF_EXPOSURE_PROG'		=> 'Exposure program',
	'VIEWEXIF_EXIF_EXPOSURE_PROG_0'		=> 'Not defined',
	'VIEWEXIF_EXIF_EXPOSURE_PROG_1'		=> 'Manual',
	'VIEWEXIF_EXIF_EXPOSURE_PROG_2'		=> 'Normal program',
	'VIEWEXIF_EXIF_EXPOSURE_PROG_3'		=> 'Aperture priority',
	'VIEWEXIF_EXIF_EXPOSURE_PROG_4'		=> 'Shutter priority',
	'VIEWEXIF_EXIF_EXPOSURE_PROG_5'		=> 'Creative program (biased toward depth of field)',
	'VIEWEXIF_EXIF_EXPOSURE_PROG_6'		=> 'Action program (biased toward fast shutter speed)',
	'VIEWEXIF_EXIF_EXPOSURE_PROG_7'		=> 'Portrait mode (for closeup photos with the background out of focus)',
	'VIEWEXIF_EXIF_EXPOSURE_PROG_8'		=> 'Landscape mode (for landscape photos with the background in focus)',

	'VIEWEXIF_EXIF_FLASH'				=> 'Flash',

	'VIEWEXIF_EXIF_FLASH_CASE_0'		=> 'Flash did not fire',
	'VIEWEXIF_EXIF_FLASH_CASE_1'		=> 'Flash fired',
	'VIEWEXIF_EXIF_FLASH_CASE_5'		=> 'return light not detected',
	'VIEWEXIF_EXIF_FLASH_CASE_7'		=> 'return light detected',
	'VIEWEXIF_EXIF_FLASH_CASE_8'		=> 'On, Flash did not fire',
	'VIEWEXIF_EXIF_FLASH_CASE_9'		=> 'Flash fired, compulsory flash mode',
	'VIEWEXIF_EXIF_FLASH_CASE_13'		=> 'Flash fired, compulsory flash mode, return light not detected',
	'VIEWEXIF_EXIF_FLASH_CASE_15'		=> 'Flash fired, compulsory flash mode, return light detected',
	'VIEWEXIF_EXIF_FLASH_CASE_16'		=> 'Flash did not fire, compulsory flash mode',
	'VIEWEXIF_EXIF_FLASH_CASE_20'		=> 'Off, Flash did not fire, return light not detected',
	'VIEWEXIF_EXIF_FLASH_CASE_24'		=> 'Flash did not fire, auto mode',
	'VIEWEXIF_EXIF_FLASH_CASE_25'		=> 'Flash fired, auto mode',
	'VIEWEXIF_EXIF_FLASH_CASE_29'		=> 'Flash fired, auto mode, return light not detected',
	'VIEWEXIF_EXIF_FLASH_CASE_31'		=> 'Flash fired, auto mode, return light detected',
	'VIEWEXIF_EXIF_FLASH_CASE_32'		=> 'No flash function',
	'VIEWEXIF_EXIF_FLASH_CASE_48'		=> 'Off, No flash function',
	'VIEWEXIF_EXIF_FLASH_CASE_65'		=> 'Flash fired, red-eye reduction mode',
	'VIEWEXIF_EXIF_FLASH_CASE_69'		=> 'Flash fired, red-eye reduction mode, return light not detected',
	'VIEWEXIF_EXIF_FLASH_CASE_71'		=> 'Flash fired, red-eye reduction mode, return light detected',
	'VIEWEXIF_EXIF_FLASH_CASE_73'		=> 'Flash fired, compulsory flash mode, red-eye reduction mode',
	'VIEWEXIF_EXIF_FLASH_CASE_77'		=> 'Flash fired, compulsory flash mode, red-eye reduction mode, return light not detected',
	'VIEWEXIF_EXIF_FLASH_CASE_79'		=> 'Flash fired, compulsory flash mode, red-eye reduction mode, return light detected',
	'VIEWEXIF_EXIF_FLASH_CASE_80'		=> 'Off, Red-eye reduction',
	'VIEWEXIF_EXIF_FLASH_CASE_88'		=> 'Auto, Did not fire, Red-eye reduction',
	'VIEWEXIF_EXIF_FLASH_CASE_89'		=> 'Flash fired, auto mode, red-eye reduction mode',
	'VIEWEXIF_EXIF_FLASH_CASE_93'		=> 'Flash fired, auto mode, return light not detected, red-eye reduction mode',
	'VIEWEXIF_EXIF_FLASH_CASE_95'		=> 'Flash fired, auto mode, return light detected, red-eye reduction mode',

	'VIEWEXIF_EXIF_FOCAL'				=> 'Focus length',
	'VIEWEXIF_EXIF_FOCAL_EXP'			=> '%s mm',// 'VIEWEXIF_EXIF_FOCAL' unit

	'VIEWEXIF_EXIF_ISO'					=> 'ISO speed rating',

	'VIEWEXIF_EXIF_METERING_MODE'		=> 'Metering mode',
	'VIEWEXIF_EXIF_METERING_MODE_0'		=> 'Unknown',
	'VIEWEXIF_EXIF_METERING_MODE_1'		=> 'Average',
	'VIEWEXIF_EXIF_METERING_MODE_2'		=> 'Center-weighted average',
	'VIEWEXIF_EXIF_METERING_MODE_3'		=> 'Spot',
	'VIEWEXIF_EXIF_METERING_MODE_4'		=> 'Multi-Spot',
	'VIEWEXIF_EXIF_METERING_MODE_5'		=> 'Pattern',
	'VIEWEXIF_EXIF_METERING_MODE_6'		=> 'Partial',
	'VIEWEXIF_EXIF_METERING_MODE_255'	=> 'Other',

	'VIEWEXIF_EXIF_NOT_AVAILABLE'		=> 'not available',

	'VIEWEXIF_EXIF_WHITEB'				=> 'Whitebalance',
	'VIEWEXIF_EXIF_WHITEB_AUTO'			=> 'Auto',
	'VIEWEXIF_EXIF_WHITEB_MANU'			=> 'Manual',

	'VIEWEXIF_SHOW_EXIF'					=> 'show/hide',
	'VIEWEXIF_CLICK_HERE'				=> 'Click here',
	'VIEWEXIF_NAME_MAPSERVICE'			=> 'Google Maps'
));