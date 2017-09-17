<?php
/**
 *
 * This file is part of the viewexif extension for phpBB.
 * @package View Exif
 * @copyright (c) 2017, canonknipser
 * @license GNU General Public License, version 2 (GPL-2.0)
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
	'ACP_CK_VE'								=> 'Settings for "Show exif-data"',
	'ACP_CK_VE_TITLE'						=> 'Show exif data',
	'ACP_CK_VE_ACTIVE'						=> 'Activate EXIF?',
	'ACP_CK_VE_ACTIVE_EXPLAIN'				=> 'Show EXIF data for attached images if possible. User can disable EXIF data in their UCP',
	'ACP_CK_VE_USE_MAPS'					=> 'Use map service',
	'ACP_CK_VE_USE_MAPS_EXPLAIN'			=> 'Allow users to browse maps with GPS position of a image?<br/>Note: to see image position on a map, the display of GPS data needs to be switched on',
	'ACP_CK_VE_SAVED'						=> 'Settings have been saved successfully!',
	'ACP_CK_VE_VERSION'						=> 'Current version of viewexif',
	'ACP_CK_VE_FORUM_ALLOW'					=> 'Show EXIF data?',
	'ACP_CK_VE_FORUM_ALLOW_EXPLAIN'			=> 'Show EXIF data in this forum? If disabled, no EXIF is shown, even if it is present in a image attached to a post in this forum',
	'ACP_CK_VE_INDIVIDUAL'					=> 'Enable / disable display of individual EXIF entries',
	'ACP_CK_VE_ALLOW_DATE'					=> 'Date',
	'ACP_CK_VE_ALLOW_DATE_EXPLAIN'			=> 'Show Date',
	'ACP_CK_VE_ALLOW_FOCAL_LENGTH'			=> 'Focal length',
	'ACP_CK_VE_ALLOW_FOCAL_LENGTH_EXPLAIN'	=> 'Show Focal length',
	'ACP_CK_VE_ALLOW_EXPOSURE_TIME'			=> 'Exposure time',
	'ACP_CK_VE_ALLOW_EXPOSURE_TIME_EXPLAIN'	=> 'Show Exposure time',
	'ACP_CK_VE_ALLOW_F_NUMBER'				=> 'f-Number',
	'ACP_CK_VE_ALLOW_F_NUMBER_EXPLAIN'		=> 'Show f-Number',
	'ACP_CK_VE_ALLOW_ISO'					=> 'ISO',
	'ACP_CK_VE_ALLOW_ISO_EXPLAIN'			=> 'Show ISO',
	'ACP_CK_VE_ALLOW_WB'					=> 'White Balance',
	'ACP_CK_VE_ALLOW_WB_EXPLAIN'			=> 'Show White Balance',
	'ACP_CK_VE_ALLOW_FLASH'					=> 'Flash mode',
	'ACP_CK_VE_ALLOW_FLASH_EXPLAIN'			=> 'Show Flash mode',
	'ACP_CK_VE_ALLOW_MAKE'					=> 'Make',
	'ACP_CK_VE_ALLOW_MAKE_EXPLAIN'			=> 'Show Make',
	'ACP_CK_VE_ALLOW_MODEL'					=> 'Model',
	'ACP_CK_VE_ALLOW_MODEL_EXPLAIN'			=> 'Show Model',
	'ACP_CK_VE_ALLOW_EXPOSURE_PROG'			=> 'Exposure Program',
	'ACP_CK_VE_ALLOW_EXPOSURE_PROG_EXPLAIN'	=> 'Show Exposure Program',
	'ACP_CK_VE_ALLOW_EXPOSURE_BIAS'			=> 'Exposure Bias',
	'ACP_CK_VE_ALLOW_EXPOSURE_BIAS_EXPLAIN'	=> 'Show Exposure Bias',
	'ACP_CK_VE_ALLOW_METERING'				=> 'Metering mode',
	'ACP_CK_VE_ALLOW_METERING_EXPLAIN'		=> 'Show Metering mode',
	'ACP_CK_VE_ALLOW_GPS'					=> 'GPS Data',
	'ACP_CK_VE_ALLOW_GPS_EXPLAIN'			=> 'Show GPS Data',
));
