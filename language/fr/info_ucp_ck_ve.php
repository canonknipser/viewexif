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
	'UCP_CK_VE'						=> 'Modifier les options d’affichage',
	'UCP_CK_VE_TITLE'				=> 'Données EXIF',
	'UCP_CK_VE_ACTIVE'				=> 'Afficher les données EXIF',
	'UCP_CK_VE_ACTIVE_EXPLAIN'		=> 'Permet d’activer l’affichage des données EXIF, si disponibles, pour les images en fichiers des joints.',
	'UCP_CK_VE_MAPSERVICE'			=> 'Service de cartographie',
	'UCP_CK_VE_MAPSERVICE_EXPLAIN'	=> 'Permet de sélectionner le service de cartographie qui sera utilisé pour afficher les coordonnées GPS intégrées aux images.',
	'UCP_CK_VE_SAVED'				=> 'Les paramètres ont été sauvegardés avec succès !',
	'UCP_CK_VE_GOOGLEMAPS'			=> 'Google Maps',
	'UCP_CK_VE_OSM'					=> 'Open Street Maps',
));
