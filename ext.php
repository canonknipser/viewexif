<?php
/**
 *
 * This file is part of the viewexif extension for phpBB.
 *
 * @copyright (c) phpBB Limited <https://www.phpbb.com>
 * @license GNU General Public License, version 2 (GPL-2.0)
 *
 * For full copyright and license information, please see
 * the docs/CREDITS.txt file.
 *
 */

namespace canonknipser\viewexif;

class ext extends \phpbb\extension\base
{
	public function is_enableable()
	{
		$return_value = true;
		// several tests, each test is only executed if the previous tests did not fail
		// first test: php exif library installed?
		if ($return_value)
		{
			$return_value = function_exists('exif_read_data');
		}
		// second test: phpBB version greater equal 3.1.6?
		if ($return_value)
		{
			$config =$this->container->get('config');
			$return_value = phpbb_version_compare($config['version'], '3.1.6', '>=');
		}

		return($return_value);
	}
}
