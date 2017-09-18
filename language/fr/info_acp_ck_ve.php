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
	'ACP_CK_VE'								=> 'Paramètres',
	'ACP_CK_VE_TITLE'						=> 'Affichage des données EXIF',
	'ACP_CK_VE_ACTIVE'						=> 'Afficher les données EXIF :',
	'ACP_CK_VE_ACTIVE_EXPLAIN'				=> 'Permet d’activer l’affichage des données EXIF, si disponibles, pour les images en fichiers joints. Les membres peuvent désactiver leur affichage depuis le « Panneau de l’utilisateur ».',
	'ACP_CK_VE_USE_MAPS'					=> 'Utiliser le service de cartographie',
	'ACP_CK_VE_USE_MAPS_EXPLAIN'			=> 'Permet aux utilisateurs de parcourir la carte pour situer les coordonnées GPS de l’image.<br/>Information : pour consulter l’emplacement de l’image sur la carte il est nécessaire que l’image contiennent des coordonnées GPS.',
	'ACP_CK_VE_SAVED'						=> 'Les paramètres ont été sauvegardés avec succès !',
	'ACP_CK_VE_VERSION'						=> 'Version actuelle de l’extension :',
	'ACP_CK_VE_FORUM_ALLOW'					=> 'Afficher les données EXIF de l’image',
	'ACP_CK_VE_FORUM_ALLOW_EXPLAIN'			=> 'Permet d’activer l’affichage les données EXIF dans ce forum. Si désactivé, aucune donnée EXIF ne sera affichée, même si celle-ci est contenue dans l’image en fichier joint d’un message de ce forum.',
	'ACP_CK_VE_INDIVIDUAL'					=> 'Options d’affichage des données EXIF personnelles :',
	'ACP_CK_VE_ALLOW_DATE'					=> 'Date de prise de vue',
	'ACP_CK_VE_ALLOW_DATE_EXPLAIN'			=> 'Permet d’afficher la date de prise de vue.',
	'ACP_CK_VE_ALLOW_FOCAL_LENGTH'			=> 'Distance focale',
	'ACP_CK_VE_ALLOW_FOCAL_LENGTH_EXPLAIN'	=> 'Permet d’afficher la distance focale.',
	'ACP_CK_VE_ALLOW_EXPOSURE_TIME'			=> 'Temps d’exposition',
	'ACP_CK_VE_ALLOW_EXPOSURE_TIME_EXPLAIN'	=> 'Permet d’afficher le temps d’exposition.',
	'ACP_CK_VE_ALLOW_F_NUMBER'				=> 'Ouverture du diaphragme',
	'ACP_CK_VE_ALLOW_F_NUMBER_EXPLAIN'		=> 'Permet d’afficher l’ouverture du diaphragme.',
	'ACP_CK_VE_ALLOW_ISO'					=> 'Sensibilité ISO',
	'ACP_CK_VE_ALLOW_ISO_EXPLAIN'			=> 'Permet d’afficher la sensibilité ISO.',
	'ACP_CK_VE_ALLOW_WB'					=> 'Balance des blancs',
	'ACP_CK_VE_ALLOW_WB_EXPLAIN'			=> 'Permet d’afficher la balance des blancs.',
	'ACP_CK_VE_ALLOW_FLASH'					=> 'Mode du flash',
	'ACP_CK_VE_ALLOW_FLASH_EXPLAIN'			=> 'Permet d’afficher le mode du flash.',
	'ACP_CK_VE_ALLOW_MAKE'					=> 'Fabricant',
	'ACP_CK_VE_ALLOW_MAKE_EXPLAIN'			=> 'Permet d’afficher le fabricant.',
	'ACP_CK_VE_ALLOW_MODEL'					=> 'Modèle',
	'ACP_CK_VE_ALLOW_MODEL_EXPLAIN'			=> 'Permet d’afficher le modèle.',
	'ACP_CK_VE_ALLOW_EXPOSURE_PROG'			=> 'Mode d’exposition',
	'ACP_CK_VE_ALLOW_EXPOSURE_PROG_EXPLAIN'	=> 'Permet d’afficher le mode d’exposition.',
	'ACP_CK_VE_ALLOW_EXPOSURE_BIAS'			=> 'Correction d’exposition',
	'ACP_CK_VE_ALLOW_EXPOSURE_BIAS_EXPLAIN'	=> 'Permet d’afficher la correction d’exposition.',
	'ACP_CK_VE_ALLOW_METERING'				=> 'Mesure d’exposition',
	'ACP_CK_VE_ALLOW_METERING_EXPLAIN'		=> 'Permet d’afficher la mesure d’exposition.',
	'ACP_CK_VE_ALLOW_GPS'					=> 'Coordonnées GPS',
	'ACP_CK_VE_ALLOW_GPS_EXPLAIN'			=> 'Permet d’afficher les coordonnées GPS.',
));
