<?php
/**
 *
 * This file is part of the viewexif extension for phpBB.
 * @package View Exif
 * @copyright (c) 2017 Frank Jakobs (canonknipser)
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
	'CK_VE_REQUIRE_EXIF'				=> 'Diese Erweiterung benötigt eine installierte PHP exif Bibliothek. Bitte aktualisieren Sie ihre PHP-Installation',
	'CK_VE_REQUIRE_316'					=> 'Diese Erweiterung benötigt mindestens phpBB Version 3.1.6',
));
