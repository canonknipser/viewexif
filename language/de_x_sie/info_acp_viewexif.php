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
	'ACP_CK_VE'								=> 'Einstellungen',
	'ACP_CK_VE_TITLE'						=> 'Exif Daten',
	'ACP_CK_VE_ACTIVE'						=> 'EXIF-Anzeige aktivieren?',
	'ACP_CK_VE_ACTIVE_EXPLAIN'				=> 'Zeigt EXIF-Daten für angehängte Bilder. Die Benutzer können die Anzeige in ihrem Benutzerkontrollzentrum deaktivieren',
	'ACP_CK_VE_USE_MAPS'					=> 'Kartenanzeige verwenden',
	'ACP_CK_VE_USE_MAPS_EXPLAIN'			=> 'Erlaubt den Benutzern, die Aufnahmeposition eines Bildes auf einer Karte anzuzeigen, sofern das Bild GPS-Koordinaten enthält.',
	'ACP_CK_VE_SAVED'						=> 'Die Einstellungen wurden erfolgreich gespeichert!',
	'ACP_CK_VE_VERSION'						=> 'Aktuelle Version von viewexif',
	'ACP_CK_VE_FORUM_ALLOW'					=> 'EXIF-Daten anzeigen?',
	'ACP_CK_VE_FORUM_ALLOW_EXPLAIN'			=> 'Sollen die EXIF-Daten in diesem Forum angezeigt werden? Wenn diese Option deaktiviert ist, werden keine EXIF-Daten angezeigt, auch wenn diese in einem angehängten Bild enthalten sind',
	'ACP_CK_VE_INDIVIDUAL'					=> 'Ein-/Ausschalten der Anzeige von individuellen EXIF-Einträgen',
	'ACP_CK_VE_ALLOW_DATE'					=> 'Datum',
	'ACP_CK_VE_ALLOW_DATE_EXPLAIN'			=> 'Zeige Datum',
	'ACP_CK_VE_ALLOW_FOCAL_LENGTH'			=> 'Fokuslänge',
	'ACP_CK_VE_ALLOW_FOCAL_LENGTH_EXPLAIN'	=> 'Zeige Fokuslänge',
	'ACP_CK_VE_ALLOW_EXPOSURE_TIME'			=> 'Belichtungszeit',
	'ACP_CK_VE_ALLOW_EXPOSURE_TIME_EXPLAIN'	=> 'Zeige Belichtungszeit',
	'ACP_CK_VE_ALLOW_F_NUMBER'				=> 'Blende',
	'ACP_CK_VE_ALLOW_F_NUMBER_EXPLAIN'		=> 'Zeige Blende',
	'ACP_CK_VE_ALLOW_ISO'					=> 'ISO',
	'ACP_CK_VE_ALLOW_ISO_EXPLAIN'			=> 'Zeige ISO',
	'ACP_CK_VE_ALLOW_WB'					=> 'Weißabgleich',
	'ACP_CK_VE_ALLOW_WB_EXPLAIN'			=> 'Zeige Weißabgleich',
	'ACP_CK_VE_ALLOW_FLASH'					=> 'Blitzmodus',
	'ACP_CK_VE_ALLOW_FLASH_EXPLAIN'			=> 'Zeige Blitzmodus',
	'ACP_CK_VE_ALLOW_MAKE'					=> 'Hersteller',
	'ACP_CK_VE_ALLOW_MAKE_EXPLAIN'			=> 'Zeige Hersteller',
	'ACP_CK_VE_ALLOW_MODEL'					=> 'Modell',
	'ACP_CK_VE_ALLOW_MODEL_EXPLAIN'			=> 'Zeige Modell',
	'ACP_CK_VE_ALLOW_EXPOSURE_PROG'			=> 'Belichtungsprogramm',
	'ACP_CK_VE_ALLOW_EXPOSURE_PROG_EXPLAIN'	=> 'Zeige Belichtungsprogramm',
	'ACP_CK_VE_ALLOW_EXPOSURE_BIAS'			=> 'Belichtungskorrektur',
	'ACP_CK_VE_ALLOW_EXPOSURE_BIAS_EXPLAIN'	=> 'Zeige Belichtungskorrektur',
	'ACP_CK_VE_ALLOW_METERING'				=> 'Messmethode',
	'ACP_CK_VE_ALLOW_METERING_EXPLAIN'		=> 'Zeige Messmethode',
	'ACP_CK_VE_ALLOW_GPS'					=> 'GPS-Daten',
	'ACP_CK_VE_ALLOW_GPS_EXPLAIN'			=> 'Zeige GPS-Daten',
));
