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
	'CK_VE_EXIF_CAPTION'			=> 'EXIF-Daten',
	'CK_VE_EXIF_APERTURE'			=> 'Blendenwert',
	'CK_VE_EXIF_CAM_MODEL'			=> 'Kamera-Modell',
	'CK_VE_EXIF_CAM_MAKE'			=> 'Kamera-Hersteller',

	'CK_VE_EXIF_DATE'				=> 'Bild aufgenommen am/um',

	'CK_VE_EXIF_EXPOSURE'			=> 'Belichtungszeit',
	'CK_VE_EXIF_EXPOSURE_EXP'		=> '%s Sek',// 'CK_VE_EXIF_EXPOSURE' unit
	'CK_VE_EXIF_EXPOSURE_BIAS'		=> 'Belichtungskorrektur',
	'CK_VE_EXIF_EXPOSURE_BIAS_EXP'	=> '%s EV',// 'CK_VE_EXIF_EXPOSURE_BIAS' unit
	'CK_VE_EXIF_EXPOSURE_PROG'		=> 'Belichtungsmodus',
	'CK_VE_EXIF_EXPOSURE_PROG_0'	=> 'Nicht definert',
	'CK_VE_EXIF_EXPOSURE_PROG_1'	=> 'Manuell',
	'CK_VE_EXIF_EXPOSURE_PROG_2'	=> 'Automatikprogramm',
	'CK_VE_EXIF_EXPOSURE_PROG_3'	=> 'Blendenvorwahl',
	'CK_VE_EXIF_EXPOSURE_PROG_4'	=> 'Zeitvorwahl',
	'CK_VE_EXIF_EXPOSURE_PROG_5'	=> 'Kreativprogramm (optimiert auf größtmöglichen Schärfebereich)',
	'CK_VE_EXIF_EXPOSURE_PROG_6'	=> 'Sportprogramm (optimiert auf kurze Belichtungszeit)',
	'CK_VE_EXIF_EXPOSURE_PROG_7'	=> 'Portraitmodus (Hintergrund außerhalb des Fokus',
	'CK_VE_EXIF_EXPOSURE_PROG_8'	=> 'Landschaftsmodus (Hintergrund im Fokus)',

	'CK_VE_EXIF_FLASH'				=> 'Blitz',

	'CK_VE_EXIF_FLASH_CASE_0'		=> 'Blitz nicht ausgelöst',
	'CK_VE_EXIF_FLASH_CASE_1'		=> 'Blitz ausgelöst',
	'CK_VE_EXIF_FLASH_CASE_5'		=> 'Messlicht-Rückgabe nicht erkannt',
	'CK_VE_EXIF_FLASH_CASE_7'		=> 'Messlicht-Rückgabe erkannt',
	'CK_VE_EXIF_FLASH_CASE_8'		=> 'An, Blitz nicht ausgelöst',
	'CK_VE_EXIF_FLASH_CASE_9'		=> 'Blitz ausgelöst, Erzwungener Blitzmodus',
	'CK_VE_EXIF_FLASH_CASE_13'		=> 'Blitz ausgelöst, Erzwungener Blitzmodus, Messlicht-Rückgabe nicht erkannt',
	'CK_VE_EXIF_FLASH_CASE_15'		=> 'Blitz ausgelöst, Erzwungener Blitzmodus, Messlicht-Rückgabe erkannt',
	'CK_VE_EXIF_FLASH_CASE_16'		=> 'Blitz nicht ausgelöst, Erzwungener Blitzmodus',
	'CK_VE_EXIF_FLASH_CASE_20'		=> 'Aus, Blitz nicht ausgelöst, Messlicht-Rückgabe nicht erkannt',
	'CK_VE_EXIF_FLASH_CASE_24'		=> 'Blitz nicht ausgelöst, Automatischer Modus',
	'CK_VE_EXIF_FLASH_CASE_25'		=> 'Blitz ausgelöst, Automatischer Modus',
	'CK_VE_EXIF_FLASH_CASE_29'		=> 'Blitz ausgelöst, Automatischer Modus, Messlicht-Rückgabe nicht erkannt',
	'CK_VE_EXIF_FLASH_CASE_31'		=> 'Blitz ausgelöst, Automatischer Modus, Messlicht-Rückgabe erkannt',
	'CK_VE_EXIF_FLASH_CASE_32'		=> 'Keine Blitzfunktion',
	'CK_VE_EXIF_FLASH_CASE_48'		=> 'Aus, Keine Blitzfunktion',
	'CK_VE_EXIF_FLASH_CASE_65'		=> 'Blitz ausgelöst, Rote-Augen-Verringerung',
	'CK_VE_EXIF_FLASH_CASE_69'		=> 'Blitz ausgelöst, Rote-Augen-Verringerung, Messlicht-Rückgabe nicht erkannt',
	'CK_VE_EXIF_FLASH_CASE_71'		=> 'Blitz ausgelöst, Rote-Augen-Verringerung, Messlicht-Rückgabe erkannt',
	'CK_VE_EXIF_FLASH_CASE_73'		=> 'Blitz ausgelöst, Erzwungener Blitzmodus, Rote-Augen-Verringerung',
	'CK_VE_EXIF_FLASH_CASE_77'		=> 'Blitz ausgelöst, Erzwungener Blitzmodus, Rote-Augen-Verringerung, Messlicht-Rückgabe nicht erkannt',
	'CK_VE_EXIF_FLASH_CASE_79'		=> 'Blitz ausgelöst, Erzwungener Blitzmodus, Rote-Augen-Verringerung, Messlicht-Rückgabe erkannt',
	'CK_VE_EXIF_FLASH_CASE_80'		=> 'Aus, Rote-Augen-Verringerung',
	'CK_VE_EXIF_FLASH_CASE_88'		=> 'Auto, Did not fire, Rote-Augen-Verringerung',
	'CK_VE_EXIF_FLASH_CASE_89'		=> 'Blitz ausgelöst, Automatischer Modus, Rote-Augen-Verringerung',
	'CK_VE_EXIF_FLASH_CASE_93'		=> 'Blitz ausgelöst, Automatischer Modus, Messlicht-Rückgabe nicht erkannt, Rote-Augen-Verringerung',
	'CK_VE_EXIF_FLASH_CASE_95'		=> 'Blitz ausgelöst, Automatischer Modus, Messlicht-Rückgabe erkannt, Rote-Augen-Verringerung',

	'CK_VE_EXIF_FOCAL'				=> 'Brennweite',
	'CK_VE_EXIF_FOCAL_EXP'			=> '%s mm',// 'CK_VE_EXIF_FOCAL' unit

	'CK_VE_EXIF_ISO'				=> 'ISO',

	'CK_VE_EXIF_METERING_MODE'		=> 'Belichtungsmessung',
	'CK_VE_EXIF_METERING_MODE_0'	=> 'Unbekannt',
	'CK_VE_EXIF_METERING_MODE_1'	=> 'Gewichtet',
	'CK_VE_EXIF_METERING_MODE_2'	=> 'Zentrums-basierte Gewichtung',
	'CK_VE_EXIF_METERING_MODE_3'	=> 'Spot',
	'CK_VE_EXIF_METERING_MODE_4'	=> 'Multi-Spot',
	'CK_VE_EXIF_METERING_MODE_5'	=> 'Muster',
	'CK_VE_EXIF_METERING_MODE_6'	=> 'Partiell',
	'CK_VE_EXIF_METERING_MODE_255'	=> 'Andere',

	'CK_VE_EXIF_NOT_AVAILABLE'		=> 'nicht verfügbar',

	'CK_VE_EXIF_WHITEB'				=> 'Weißabgleich',
	'CK_VE_EXIF_WHITEB_AUTO'		=> 'Automatisch',
	'CK_VE_EXIF_WHITEB_MANU'		=> 'Manuell',

	'CK_VE_SHOW_EXIF'				=> 'anzeigen/verbergen',
	'CK_VE_CLICK_HERE'				=> 'Hier klicken',
	'CK_VE_NAME_MAPSERVICE'			=> 'Google Maps'
));
