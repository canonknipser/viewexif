<?php
/**
 *
 * Show exif-data. An extension for the phpBB Forum Software package.
 * French translation by Galixte (http://www.galixte.com)
 *
 * @copyright (c) 2017 canonknipser <http://canonknipser.com>
 * @license GNU General Public License, version 2 (GPL-2.0)
 *
 */

/**
 * DO NOT CHANGE
 */
if (!defined('IN_PHPBB'))
{
	exit;
}

if (empty($lang) || !is_array($lang))
{
	$lang = array();
}

// DEVELOPERS PLEASE NOTE
//
// All language files should use UTF-8 as their encoding and the files must not contain a BOM.
//
// Placeholders can now contain order information, e.g. instead of
// 'Page %s of %s' you can (and should) write 'Page %1$s of %2$s', this allows
// translators to re-order the output of data while ensuring it remains correct
//
// You do not need this where single placeholders are used, e.g. 'Message %d' is fine
// equally where a string contains only two placeholders which are used to wrap text
// in a url you again do not need to specify an order e.g., 'Click %sHERE%s' is fine
//
// Some characters you may want to copy&paste:
// ’ « » “ ” …
//

$lang = array_merge($lang, array(
	'CK_VE_EXIF_CAPTION'			=> 'Données EXIF',
	'CK_VE_EXIF_APERTURE'			=> 'Ouverture du diaphragme',
	'CK_VE_EXIF_CAM_MODEL'			=> 'Modèle',
	'CK_VE_EXIF_CAM_MAKE'			=> 'Fabricant',
	'CK_VE_EXIF_DATE'				=> 'Date de prise de vue',

	'CK_VE_EXIF_EXPOSURE'			=> 'Temps d’exposition',
	'CK_VE_EXIF_EXPOSURE_EXP'		=> '%s s',// 'CK_VE_EXIF_EXPOSURE' unit
	'CK_VE_EXIF_EXPOSURE_BIAS'		=> 'Correction d’exposition',
	'CK_VE_EXIF_EXPOSURE_BIAS_EXP'	=> '%s IL',// 'CK_VE_EXIF_EXPOSURE_BIAS' unit
	'CK_VE_EXIF_EXPOSURE_PROG'		=> 'Modes d’exposition',
	'CK_VE_EXIF_EXPOSURE_PROG_0'	=> 'Non défini',
	'CK_VE_EXIF_EXPOSURE_PROG_1'	=> 'Manuel',
	'CK_VE_EXIF_EXPOSURE_PROG_2'	=> 'Normal',
	'CK_VE_EXIF_EXPOSURE_PROG_3'	=> 'Priorité à l’ouverture',
	'CK_VE_EXIF_EXPOSURE_PROG_4'	=> 'Priorité à la vitesse',
	'CK_VE_EXIF_EXPOSURE_PROG_5'	=> 'Créatif (favorise la profondeur de champ)',
	'CK_VE_EXIF_EXPOSURE_PROG_6'	=> 'Action (favorise la vitesse d’obturation)',
	'CK_VE_EXIF_EXPOSURE_PROG_7'	=> 'Portrait (pour des photos proches avec l’arrière-plan flou)',
	'CK_VE_EXIF_EXPOSURE_PROG_8'	=> 'Paysage (pour des photos de paysages avec l’arrière-plan net)',

	'CK_VE_EXIF_FLASH'				=> 'Flash',

	'CK_VE_EXIF_FLASH_CASE_0'		=> 'Flash non déclenché',
	'CK_VE_EXIF_FLASH_CASE_1'		=> 'Flash déclenché',
	'CK_VE_EXIF_FLASH_CASE_5'		=> 'retour de lumière non détecté',
	'CK_VE_EXIF_FLASH_CASE_7'		=> 'retour de lumière détecté',
	'CK_VE_EXIF_FLASH_CASE_8'		=> 'Allumé, non déclenché',
	'CK_VE_EXIF_FLASH_CASE_9'		=> 'Flash déclenché, flash forcé',
	'CK_VE_EXIF_FLASH_CASE_13'		=> 'Flash déclenché, flash forcé, retour de lumière non détecté',
	'CK_VE_EXIF_FLASH_CASE_15'		=> 'Flash déclenché, flash forcé, retour de lumière détecté',
	'CK_VE_EXIF_FLASH_CASE_16'		=> 'Flash non déclenché, flash forcé',
	'CK_VE_EXIF_FLASH_CASE_20'		=> 'Éteint, flash non déclenché, retour de lumière non détecté',
	'CK_VE_EXIF_FLASH_CASE_24'		=> 'Flash non déclenché, mode auto',
	'CK_VE_EXIF_FLASH_CASE_25'		=> 'Flash déclenché, mode auto',
	'CK_VE_EXIF_FLASH_CASE_29'		=> 'Flash déclenché, mode auto, retour de lumière non détecté',
	'CK_VE_EXIF_FLASH_CASE_31'		=> 'Flash déclenché, mode auto, retour de lumière détecté',
	'CK_VE_EXIF_FLASH_CASE_32'		=> 'Aucune fonction flash',
	'CK_VE_EXIF_FLASH_CASE_48'		=> 'Éteint, aucune fonction flash',
	'CK_VE_EXIF_FLASH_CASE_65'		=> 'Flash déclenché, mode réduction des yeux rouges',
	'CK_VE_EXIF_FLASH_CASE_69'		=> 'Flash déclenché, mode réduction des yeux rouges, retour de lumière non détecté',
	'CK_VE_EXIF_FLASH_CASE_71'		=> 'Flash déclenché, mode réduction des yeux rouges, retour de lumière détecté',
	'CK_VE_EXIF_FLASH_CASE_73'		=> 'Flash déclenché, flash forcé, mode réduction des yeux rouges',
	'CK_VE_EXIF_FLASH_CASE_77'		=> 'Flash déclenché, flash forcé, mode réduction des yeux rouges, retour de lumière non détecté',
	'CK_VE_EXIF_FLASH_CASE_79'		=> 'Flash déclenché, flash forcé, mode réduction des yeux rouges, retour de lumière détecté',
	'CK_VE_EXIF_FLASH_CASE_80'		=> 'Éteint, mode réduction des yeux rouges',
	'CK_VE_EXIF_FLASH_CASE_88'		=> 'Auto, flash non déclenché, mode réduction des yeux rouges',
	'CK_VE_EXIF_FLASH_CASE_89'		=> 'Flash déclenché, mode auto, mode réduction des yeux rouges',
	'CK_VE_EXIF_FLASH_CASE_93'		=> 'Flash déclenché, mode auto, retour de lumière non détecté, mode réduction des yeux rouges',
	'CK_VE_EXIF_FLASH_CASE_95'		=> 'Flash déclenché, mode auto, retour de lumière détecté, mode réduction des yeux rouges',

	'CK_VE_EXIF_FOCAL'				=> 'Distance focale',
	'CK_VE_EXIF_FOCAL_EXP'			=> '%s mm',// 'CK_VE_EXIF_FOCAL' unit

	'CK_VE_EXIF_ISO'				=> 'Sensibilité ISO',

	'CK_VE_EXIF_METERING_MODE'		=> 'Mesure d’exposition',
	'CK_VE_EXIF_METERING_MODE_0'	=> 'Inconnue',
	'CK_VE_EXIF_METERING_MODE_1'	=> 'Moyenne',
	'CK_VE_EXIF_METERING_MODE_2'	=> 'Mesure pondérée centrale',
	'CK_VE_EXIF_METERING_MODE_3'	=> 'Mesure spot',
	'CK_VE_EXIF_METERING_MODE_4'	=> 'Mesure multi-zone',
	'CK_VE_EXIF_METERING_MODE_5'	=> 'Matricielle',
	'CK_VE_EXIF_METERING_MODE_6'	=> 'Mesure partielle',
	'CK_VE_EXIF_METERING_MODE_255'	=> 'Autre',

	'CK_VE_EXIF_NOT_AVAILABLE'		=> 'Non disponibles',

	'CK_VE_EXIF_WHITEB'				=> 'Balance des blancs',
	'CK_VE_EXIF_WHITEB_AUTO'		=> 'Automatique',
	'CK_VE_EXIF_WHITEB_MANU'		=> 'Manuelle',

	'CK_VE_SHOW_EXIF'				=> 'Afficher/masquer',
	// 1.1.0: wording changed
	'CK_VE_CLICK_HERE'				=> 'Cliquer ici pour ouvrir la carte',
	'CK_VE_NAME_MAPSERVICE'			=> 'Google Maps',

	// 1.1.0 new language variables
	'CK_VE_COORDINATES'				=>	'Coordonnées',
	'CK_VE_GOOGLEMAPS'				=>	'Google Maps',
	'CK_VE_OSM'						=>	'Open Street Maps',
	'CK_VE_EXIF_DATE_ORIG'			=>	'Date d’enregistrement originale',
));
