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
	'UCP_CK_VE'						=> 'Einstellungen',
	'UCP_CK_VE_TITLE'				=> 'EXIF-Daten',
	'UCP_CK_VE_ACTIVE'				=> 'EXIF-Anzeige aktivieren?',
	'UCP_CK_VE_ACTIVE_EXPLAIN'		=> 'Zeigt EXIF-Daten von Bildern, sofern möglich',
	'UCP_CK_VE_MAPSERVICE'			=> 'Kartenservice',
	'UCP_CK_VE_MAPSERVICE_EXPLAIN'	=> 'Wählen Sie den Kartenservice, der für die Anzeige von GPS-Koordinaten genutzt werden soll.',
	'UCP_CK_VE_SAVED'				=> 'Einstellungen wurden erfolgreich gespeichert!',
	'UCP_CK_VE_GOOGLEMAPS'			=>	'Google Maps',
	'UCP_CK_VE_OSM'					=>	'Open Street Maps',
));
