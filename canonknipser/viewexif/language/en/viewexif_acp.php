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
	'CK_VE_REQUIRE_EXIF'				=> 'This extension requires the PHP exif library to be installed. Please update your PHP installation',
	'CK_VE_REQUIRE_316'					=> 'This extension requires at least phpBB version 3.1.6',
));
