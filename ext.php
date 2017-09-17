<?php
/**
 *
 * This file is part of the viewexif extension for phpBB.
 * @package View Exif
 * @copyright (c) 2017 Frank Jakobs (canonknipser)
 * @license GNU General Public License, version 2 (GPL-2.0)
 *
 */

namespace canonknipser\viewexif;

/**
* Extension class for custom enable/disable/purge actions
*/

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
			if (!$return_value)
			{
				$user = $this->container->get('user');
				$user->add_lang_ext('canonknipser/viewexif', 'viewexif_acp');
				trigger_error($user->lang('CK_VE_REQUIRE_EXIF'), E_USER_WARNING);
			}
		}
		// second test: phpBB version greater equal 3.1.6?
		if ($return_value)
		{
			$config =$this->container->get('config');
			$return_value = phpbb_version_compare($config['version'], '3.1.6', '>=');
			if (!$return_value)
			{
				$user = $this->container->get('user');
				$user->add_lang_ext('canonknipser/viewexif', 'viewexif_acp');
				trigger_error($user->lang('CK_VE_REQUIRE_316'), E_USER_WARNING);
			}
		}

		return($return_value);
	}
}
