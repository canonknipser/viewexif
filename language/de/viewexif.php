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
 * GERMAN (de) language pack for canonknipser/viewexif
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
	'VIEWEXIF_EXIF_CAPTION'				=> 'EXIF-Daten',
	'VIEWEXIF_EXIF_APERTURE'			=> 'Blendenwert',
	'VIEWEXIF_EXIF_CAM_MODEL'			=> 'Kamera-Model',
	'VIEWEXIF_EXIF_DATE'				=> 'Bild aufgenommen am/um',

	'VIEWEXIF_EXIF_EXPOSURE'			=> 'Belichtungszeit',
	'VIEWEXIF_EXIF_EXPOSURE_EXP'		=> '%s Sek',// 'VIEWEXIF_EXIF_EXPOSURE' unit
	'VIEWEXIF_EXIF_EXPOSURE_BIAS'		=> 'Belichtungskorrektur',
	'VIEWEXIF_EXIF_EXPOSURE_BIAS_EXP'	=> '%s EV',// 'VIEWEXIF_EXIF_EXPOSURE_BIAS' unit
	'VIEWEXIF_EXIF_EXPOSURE_PROG'		=> 'Belichtungsmodus',
	'VIEWEXIF_EXIF_EXPOSURE_PROG_0'		=> 'Nicht definert',
	'VIEWEXIF_EXIF_EXPOSURE_PROG_1'		=> 'Manuell',
	'VIEWEXIF_EXIF_EXPOSURE_PROG_2'		=> 'Normales Programm',
	'VIEWEXIF_EXIF_EXPOSURE_PROG_3'		=> 'Blendenvorwahl',
	'VIEWEXIF_EXIF_EXPOSURE_PROG_4'		=> 'Zeitvorwahl',
	'VIEWEXIF_EXIF_EXPOSURE_PROG_5'		=> 'Kreativprogramm (optimiert auf größtmöglichen Schärfebereich)',
	'VIEWEXIF_EXIF_EXPOSURE_PROG_6'		=> 'Sportprogramm (optimiert auf kurze Belichtungszeit)',
	'VIEWEXIF_EXIF_EXPOSURE_PROG_7'		=> 'Portraitmodus (Hintergrund außerhalb des Fokus',
	'VIEWEXIF_EXIF_EXPOSURE_PROG_8'		=> 'Landschaftsmodus (Hintergrund im Fokus)',

	'VIEWEXIF_EXIF_FLASH'				=> 'Blitz',

	'VIEWEXIF_EXIF_FLASH_CASE_0'		=> 'Blitz nicht ausgelöst',
	'VIEWEXIF_EXIF_FLASH_CASE_1'		=> 'Blitz ausgelöst',
	'VIEWEXIF_EXIF_FLASH_CASE_5'		=> 'Messlicht-Rückgabe nicht erkannt',
	'VIEWEXIF_EXIF_FLASH_CASE_7'		=> 'Messlicht-Rückgabe erkannt',
	'VIEWEXIF_EXIF_FLASH_CASE_8'		=> 'An, Blitz nicht ausgelöst',
	'VIEWEXIF_EXIF_FLASH_CASE_9'		=> 'Blitz ausgelöst, Erzwungener Blitzmodus',
	'VIEWEXIF_EXIF_FLASH_CASE_13'		=> 'Blitz ausgelöst, Erzwungener Blitzmodus, Messlicht-Rückgabe nicht erkannt',
	'VIEWEXIF_EXIF_FLASH_CASE_15'		=> 'Blitz ausgelöst, Erzwungener Blitzmodus, Messlicht-Rückgabe erkannt',
	'VIEWEXIF_EXIF_FLASH_CASE_16'		=> 'Blitz nicht ausgelöst, Erzwungener Blitzmodus',
	'VIEWEXIF_EXIF_FLASH_CASE_20'		=> 'Aus, Blitz nicht ausgelöst, Messlicht-Rückgabe nicht erkannt',
	'VIEWEXIF_EXIF_FLASH_CASE_24'		=> 'Blitz nicht ausgelöst, Automatischer Modus',
	'VIEWEXIF_EXIF_FLASH_CASE_25'		=> 'Blitz ausgelöst, Automatischer Modus',
	'VIEWEXIF_EXIF_FLASH_CASE_29'		=> 'Blitz ausgelöst, Automatischer Modus, Messlicht-Rückgabe nicht erkannt',
	'VIEWEXIF_EXIF_FLASH_CASE_31'		=> 'Blitz ausgelöst, Automatischer Modus, Messlicht-Rückgabe erkannt',
	'VIEWEXIF_EXIF_FLASH_CASE_32'		=> 'Keine Blitzfunktion',
	'VIEWEXIF_EXIF_FLASH_CASE_48'		=> 'Aus, Keine Blitzfunktion',
	'VIEWEXIF_EXIF_FLASH_CASE_65'		=> 'Blitz ausgelöst, Rote-Augen-Verringerung',
	'VIEWEXIF_EXIF_FLASH_CASE_69'		=> 'Blitz ausgelöst, Rote-Augen-Verringerung, Messlicht-Rückgabe nicht erkannt',
	'VIEWEXIF_EXIF_FLASH_CASE_71'		=> 'Blitz ausgelöst, Rote-Augen-Verringerung, Messlicht-Rückgabe erkannt',
	'VIEWEXIF_EXIF_FLASH_CASE_73'		=> 'Blitz ausgelöst, Erzwungener Blitzmodus, Rote-Augen-Verringerung',
	'VIEWEXIF_EXIF_FLASH_CASE_77'		=> 'Blitz ausgelöst, Erzwungener Blitzmodus, Rote-Augen-Verringerung, Messlicht-Rückgabe nicht erkannt',
	'VIEWEXIF_EXIF_FLASH_CASE_79'		=> 'Blitz ausgelöst, Erzwungener Blitzmodus, Rote-Augen-Verringerung, Messlicht-Rückgabe erkannt',
	'VIEWEXIF_EXIF_FLASH_CASE_80'		=> 'Aus, Rote-Augen-Verringerung',
	'VIEWEXIF_EXIF_FLASH_CASE_88'		=> 'Auto, Did not fire, Rote-Augen-Verringerung',
	'VIEWEXIF_EXIF_FLASH_CASE_89'		=> 'Blitz ausgelöst, Automatischer Modus, Rote-Augen-Verringerung',
	'VIEWEXIF_EXIF_FLASH_CASE_93'		=> 'Blitz ausgelöst, Automatischer Modus, Messlicht-Rückgabe nicht erkannt, Rote-Augen-Verringerung',
	'VIEWEXIF_EXIF_FLASH_CASE_95'		=> 'Blitz ausgelöst, Automatischer Modus, Messlicht-Rückgabe erkannt, Rote-Augen-Verringerung',

	'VIEWEXIF_EXIF_FOCAL'				=> 'Brennweite',
	'VIEWEXIF_EXIF_FOCAL_EXP'			=> '%s mm',// 'VIEWEXIF_EXIF_FOCAL' unit

	'VIEWEXIF_EXIF_ISO'					=> 'ISO',

	'VIEWEXIF_EXIF_METERING_MODE'		=> 'Belichtungsmessung',
	'VIEWEXIF_EXIF_METERING_MODE_0'		=> 'Unbekannt',
	'VIEWEXIF_EXIF_METERING_MODE_1'		=> 'Gewichtet',
	'VIEWEXIF_EXIF_METERING_MODE_2'		=> 'Zentrums-basierte Gewichtung',
	'VIEWEXIF_EXIF_METERING_MODE_3'		=> 'Spot',
	'VIEWEXIF_EXIF_METERING_MODE_4'		=> 'Multi-Spot',
	'VIEWEXIF_EXIF_METERING_MODE_5'		=> 'Muster',
	'VIEWEXIF_EXIF_METERING_MODE_6'		=> 'Partiell',
	'VIEWEXIF_EXIF_METERING_MODE_255'	=> 'Andere',

	'VIEWEXIF_EXIF_NOT_AVAILABLE'		=> 'nicht verfügbar',

	'VIEWEXIF_EXIF_WHITEB'				=> 'Weißabgleich',
	'VIEWEXIF_EXIF_WHITEB_AUTO'			=> 'Automatisch',
	'VIEWEXIF_EXIF_WHITEB_MANU'			=> 'Manuell',

	'VIEWEXIF_SHOW_EXIF'					=> 'show/hide',
	'VIEWEXIF_CLICK_HERE'				=> 'Hier klicken',
	'VIEWEXIF_NAME_MAPSERVICE'			=> 'Google Maps'
));
