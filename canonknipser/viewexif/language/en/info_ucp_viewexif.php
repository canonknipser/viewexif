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
	'UCP_CK_VE'						=> 'Settings',
	'UCP_CK_VE_TITLE'				=> 'Show exif data',
	'UCP_CK_VE_ACTIVE'				=> 'Activate EXIF?',
	'UCP_CK_VE_ACTIVE_EXPLAIN'		=> 'Show EXIF data for attached images if possible.',
	'UCP_CK_VE_MAPSERVICE'			=> 'Map service',
	'UCP_CK_VE_MAPSERVICE_EXPLAIN'	=> 'Select the map service which should be used to show GPS-coordinates imbedded in a image',
	'UCP_CK_VE_SAVED'				=> 'Settings have been saved successfully!',
	'UCP_CK_VE_GOOGLEMAPS'			=>	'Google Maps',
	'UCP_CK_VE_OSM'					=>	'Open Street Maps',
));
