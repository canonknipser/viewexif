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
 */

namespace canonknipser\viewexif\event;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;

/**
 * Event listener
 */
class main_listener implements EventSubscriberInterface
{
static public function getSubscribedEvents()
{
	return array(
		'core.parse_attachments_modify_template_data'	=> 'ck_ve_get_exif_data',
		'core.acp_manage_forums_initialise_data'		=> 'ck_ve_acp_manage_forums_init',
		'core.acp_manage_forums_display_form'			=> 'ck_ve_acp_manage_forums_form',
		'core.acp_manage_forums_request_data'			=> 'ck_ve_acp_manage_forums_data',
	);
}

/* @var \phpbb\controller\helper */
protected $helper;

/* @var \phpbb\template\template */
protected $template;

/* @var \phpbb\user */
protected $user;

/** @var \phpbb\request\request */
protected $request;

/** @var \phpbb\db\driver\driver */
protected $db;

/**
	* Constructor
	*
	* @param \phpbb\controller\helper			$helper
	* @param \phpbb\template\template			$template
	* @param \phpbb\config\config				$config		Config object
	* @param string								$root_path	phpBB root path
	* @param \phpbb\user						$user		user object
	* @param \phpbb\request\request				$request
	* @param \phpbb\db\driver\driver_interface	$db

 */
public function __construct(\phpbb\controller\helper $helper,
		\phpbb\template\template $template,
		\phpbb\config\config $config,
		$root_path,
		\phpbb\user $user,
		\phpbb\request\request $request,
		\phpbb\db\driver\driver_interface $db
		)
{
	$this->helper		= $helper;
	$this->template		= $template;
	$this->config		= $config;
	$this->root_path	= $root_path;
	$this->user			= $user;
	$this->request		= $request;
	$this->db			= $db;

}


public function ck_ve_get_exif_data($event)
{
	$attachment		= $event['attachment'];
	$block_array	= $event['block_array'];	// Template data of the attachment
	$forum_id		= $event['forum_id']; 		// forum ID of the attachment

	$active_global = $this->config['ck_ve_active_global'] && $this->user->data['ck_ve_active'];
	// exif data is enabled globally and user has it als enabled, check, if forum allows exif display
	if ($active_global && $forum_id)
	{
		//check, if forum setting allows display of exif data
		$sql = 'SELECT ck_ve_show FROM ' . FORUMS_TABLE .
			' WHERE forum_id = ' . (int) $forum_id;
		$result = $this->db->sql_query($sql);
		$row = $this->db->sql_fetchrow($result);
		$this->db->sql_freeresult($result);
		if ($row['ck_ve_show'] == 0)
		{
			$active_exif = false;
		}
		else
		{
			$active_exif = true;
		}
	}
	// validation issue: load language file only when needed
	// FIXME: add_lang_ext is deprecated in 3.2, replaced in 3.3
	$this->user->add_lang_ext('canonknipser/viewexif', 'viewexif');

	// we need the complete physical_filename for reading exif-data:
	$filename = $this->root_path . $this->config['upload_path'] . '/' . utf8_basename($attachment['physical_filename']);

	$active_global = $this->config['ck_ve_active_global'] && $this->user->data['ck_ve_active'];
	$use_mapservice = $this->config['ck_ve_use_maps'];

	// we use mimetype here - and support tiff
	$exif = ((($attachment['mimetype'] == 'image/jpeg') || ($attachment['mimetype'] == 'image/tiff'))) ? @exif_read_data($filename, "EXIF, IFD0, GPS", true) : array();

	if (($active_exif) && (!empty($exif["EXIF"]) || !empty($exif["GPS"]) || !empty($exif["IFD0"])))
	{

		// exif display is active and we got some data in the relevant metadata sections
		if (isset($exif["EXIF"]["DateTimeOriginal"]) && $this->config['ck_ve_allow_date'])
		{
			// display also the original value of date/time
			$exif_data[] = array(
					'CK_VE_EXIF_NAME'	=> $this->user->lang['CK_VE_EXIF_DATE_ORIG'],
					'CK_VE_EXIF_VALUE'	=> htmlspecialchars($exif["EXIF"]["DateTimeOriginal"]),
			);

			if ($this->user->data['user_id'] == ANONYMOUS)
			{
				// guest account has no timezone data, we need to fetch the board's timezone
				$user_timezone = $this->config['board_timezone'];
			}
			else
			{
				$user_timezone = $this->user->data['user_timezone'];
			}
			if ($user_timezone == '')
			{
				// overwrite empty timezone value
				$user_timezone = "UTC";
			}
			// The standard EXIF date/time format is "YYYY:mm:dd HH:MM:SS",
			// make sure it is read in that format
			$timestamp_year   = 0 + substr($exif["EXIF"]["DateTimeOriginal"], 0, 4);
			$timestamp_month  = 0 + substr($exif["EXIF"]["DateTimeOriginal"], 5, 2);
			$timestamp_day    = 0 + substr($exif["EXIF"]["DateTimeOriginal"], 8, 2);
			$timestamp_hour   = 0 + substr($exif["EXIF"]["DateTimeOriginal"], 11, 2);
			$timestamp_minute = 0 + substr($exif["EXIF"]["DateTimeOriginal"], 14, 2);
			$timestamp_second = 0 + substr($exif["EXIF"]["DateTimeOriginal"], 17, 2);
			// user dependend formatting
			$timestamp        = mktime($timestamp_hour, $timestamp_minute, $timestamp_second, $timestamp_month, $timestamp_day, $timestamp_year);
			// we need to respect the timezone from user's profile, so we need to calculate the diff between user timezone and UTC
			$date_time_zone_UTC = new \DateTimeZone("UTC");
			$date_time_zone_user = new \DateTimeZone($user_timezone);

			// Create DateTime object for timestamp from Image with UTC timezone
			$date_time_UTC = new \DateTime("@$timestamp", $date_time_zone_UTC);

			// Calculate the UTC offset for the date/time contained in the $date_time_zone_user (given in seconds)
			$time_offset = $date_time_zone_user->getOffset($date_time_UTC);

			$exif_data[] = array(
				'CK_VE_EXIF_NAME'	=> $this->user->lang['CK_VE_EXIF_DATE'],
				'CK_VE_EXIF_VALUE'	=> $this->user->format_date($timestamp - $time_offset, false, true),
			);
		}

		if (isset($exif["EXIF"]["FocalLength"]) && $this->config['ck_ve_allow_focal_length'])
		{
			list($num, $den) = explode("/", $exif["EXIF"]["FocalLength"]);
			$exif_data[] = array(
				'CK_VE_EXIF_NAME'	=> $this->user->lang['CK_VE_EXIF_FOCAL'],
				'CK_VE_EXIF_VALUE'	=> sprintf($this->user->lang['CK_VE_EXIF_FOCAL_EXP'], ($num/$den)),
			);
		}

		if (isset($exif["EXIF"]["ExposureTime"]) && $this->config['ck_ve_allow_exposure_time'])
		{
			list($num, $den) = explode("/", $exif["EXIF"]["ExposureTime"]);
			if ($num > $den)
			{
				$exif_exposure = $num/$den;
			}
			else
			{
				$exif_exposure = ' 1/' . $den/$num ;
			}
			$exif_data[] = array(
				'CK_VE_EXIF_NAME'	=> $this->user->lang['CK_VE_EXIF_EXPOSURE'],
				'CK_VE_EXIF_VALUE'	=> sprintf($this->user->lang['CK_VE_EXIF_EXPOSURE_EXP'], $exif_exposure),
			);
		}

		if (isset($exif["EXIF"]["FNumber"]) && $this->config['ck_ve_allow_f_number'])
		{
			list($num, $den) = explode("/", $exif["EXIF"]["FNumber"]);
			if ($den > 0)
			{
				$exif_data[] = array(
					'CK_VE_EXIF_NAME'	=> $this->user->lang['CK_VE_EXIF_APERTURE'],
					'CK_VE_EXIF_VALUE'	=> "f/" . ($num/$den),
				);
			}
			else
			{
				$exif_data[] = array(
					'CK_VE_EXIF_NAME'	=> $this->user->lang['CK_VE_EXIF_APERTURE'],
					'CK_VE_EXIF_VALUE'	=> "f/??",
				);
			}
		}

		if (isset($exif["EXIF"]["ISOSpeedRatings"]) && $this->config['ck_ve_allow_iso'])
		{
			// Issue no. 8
			// Samsung Mobile phones seems to use a array for ISOSpeedRatings, in that case pick the first array element
			is_array(($exif["EXIF"]["ISOSpeedRatings"])) ? $exif_iso = $exif["EXIF"]["ISOSpeedRatings"][0] : $exif_iso = $exif["EXIF"]["ISOSpeedRatings"];
			// make sure we really have a string, ISO value can be given as integer
			$exif_iso = "".$exif_iso;
			$exif_data[] = array(
				'CK_VE_EXIF_NAME'	=> $this->user->lang['CK_VE_EXIF_ISO'],
				'CK_VE_EXIF_VALUE'	=> htmlspecialchars($exif_iso),
			);
		}

		if (isset($exif["EXIF"]["WhiteBalance"]) && $this->config['ck_ve_allow_wb'])
		{
			$exif_data[] = array(
				'CK_VE_EXIF_NAME'	=> $this->user->lang['CK_VE_EXIF_WHITEB'],
				'CK_VE_EXIF_VALUE'	=> $this->user->lang['CK_VE_EXIF_WHITEB_' . (($exif["EXIF"]["WhiteBalance"]) ? 'MANU' : 'AUTO')],
			);
		}

		if (isset($exif["EXIF"]["Flash"]) && $this->config['ck_ve_allow_flash'])
		{
			if (isset($this->user->lang['CK_VE_EXIF_FLASH_CASE_' . $exif["EXIF"]["Flash"]]))
			{
				$exif_data[] = array(
					'CK_VE_EXIF_NAME'	=> $this->user->lang['CK_VE_EXIF_FLASH'],
					'CK_VE_EXIF_VALUE'	=> $this->user->lang['CK_VE_EXIF_FLASH_CASE_' . $exif["EXIF"]["Flash"]],
				);
			}
		}

		if (isset($exif["IFD0"]["Make"]) && $this->config['ck_ve_allow_make'])
		{
			// make sure we really have a string
			if (is_string($exif["IFD0"]["Make"]))
			{
				$exif_make = $exif["IFD0"]["Make"];
			}
			else
			{
				$exif_make = "".$exif["IFD0"]["Make"];
			}
			$exif_data[] = array(
				'CK_VE_EXIF_NAME'	=> $this->user->lang['CK_VE_EXIF_CAM_MAKE'],
				'CK_VE_EXIF_VALUE'	=> htmlspecialchars(ucwords($exif_make)),
			);
		}

		if (isset($exif["IFD0"]["Model"]) && $this->config['ck_ve_allow_model'])
		{
			// make sure we really have a string
			if (is_string($exif["IFD0"]["Model"]))
			{
				$exif_model = $exif["IFD0"]["Model"];
			}
			else
			{
				$exif_model = "".$exif["IFD0"]["Model"];
			}
			$exif_data[] = array(
				'CK_VE_EXIF_NAME'	=> $this->user->lang['CK_VE_EXIF_CAM_MODEL'],
				'CK_VE_EXIF_VALUE'	=> htmlspecialchars(ucwords($exif_model)),
			);
		}

		if (isset($exif["EXIF"]["ExposureProgram"]) && $this->config['ck_ve_allow_exposure_prog'])
		{
			if (isset($this->user->lang['CK_VE_EXIF_EXPOSURE_PROG_' . $exif["EXIF"]["ExposureProgram"]]))
			{
				$exif_data[] = array(
					'CK_VE_EXIF_NAME'	=> $this->user->lang['CK_VE_EXIF_EXPOSURE_PROG'],
					'CK_VE_EXIF_VALUE'	=> $this->user->lang['CK_VE_EXIF_EXPOSURE_PROG_' . $exif["EXIF"]["ExposureProgram"]],
				);
			}
		}

		if (isset($exif["EXIF"]["ExposureBiasValue"]) && $this->config['ck_ve_allow_exposure_bias'])
		{
			list($num,$den) = explode("/",$exif["EXIF"]["ExposureBiasValue"]);
			if (($num/$den) == 0)
			{
				$exif_exposure_bias = 0;
			}
			else
			{
				$exif_exposure_bias = "".$exif["EXIF"]["ExposureBiasValue"];
			}
			$exif_data[] = array(
				'CK_VE_EXIF_NAME'	=> $this->user->lang['CK_VE_EXIF_EXPOSURE_BIAS'],
				'CK_VE_EXIF_VALUE'	=> htmlspecialchars(sprintf($this->user->lang['CK_VE_EXIF_EXPOSURE_BIAS_EXP'], $exif_exposure_bias)),

			);
		}

		if (isset($exif["EXIF"]["MeteringMode"]) && $this->config['ck_ve_allow_metering'])
		{
			if (isset($this->user->lang['CK_VE_EXIF_METERING_MODE_' . $exif["EXIF"]["MeteringMode"]]))
			{
				$exif_data[] = array(
					'CK_VE_EXIF_NAME'	=> $this->user->lang['CK_VE_EXIF_METERING_MODE'],
					'CK_VE_EXIF_VALUE'	=> $this->user->lang['CK_VE_EXIF_METERING_MODE_' . $exif["EXIF"]["MeteringMode"]]
				);
			}
		}

		if (isset($exif['GPS']['GPSLatitude']) && $this->config['ck_ve_allow_gps'])
		{
			// we have GPS data, extract the numeric values for degree, minute, second
			$lat = $exif['GPS']['GPSLatitude'];

			//issue #12: try to fix incorrect coordinates
			list($num, $dec) = explode('/', $lat[0]);
			$lat_d = $this->ck_ve_calc_array($num, $dec);

			list($num, $dec) = explode('/', $lat[1]);
			$lat_m = $this->ck_ve_calc_array($num, $dec);

			list($num, $dec) = explode('/', $lat[2]);
			$lat_s = $this->ck_ve_calc_array($num, $dec);
			// calculate decimal value for latidude, eg for google maps
			$lat_dec = $lat_d + ($lat_m / 60.0) + ($lat_s / 3600.0);

			$lat_ref = $exif['GPS']['GPSLatitudeRef'];
			if ($lat_ref == 'S')
			{
				$lat_prefix_letter	= 'S';
				$lat_prefix_plus	= '-';
			}
			else
			{
				$lat_prefix_letter	= 'N';
				$lat_prefix_plus	= '+';
			}

			$lon = $exif['GPS']['GPSLongitude'];

			list($num, $dec) = explode('/', $lon[0]);
			$lon_d = $this->ck_ve_calc_array($num, $dec);

			list($num, $dec) = explode('/', $lon[1]);
			$lon_m = $this->ck_ve_calc_array($num, $dec);

			list($num, $dec) = explode('/', $lon[2]);
			$lon_s = $this->ck_ve_calc_array($num, $dec);

			// calculate decimal value for latidude, eg for google maps
			$lon_dec = $lon_d  + ($lon_m / 60.0) + ($lon_s / 3600.0);

			$lon_ref = $exif['GPS']['GPSLongitudeRef'];
			if ($lon_ref == 'E')
			{
				$lon_prefix_letter	= 'E';
				$lon_prefix_plus	= '+';
			}
			else
			{
				$lon_prefix_letter	= 'W';
				$lon_prefix_plus	= '-';
			}

			$exif_data[] = array(
					'CK_VE_EXIF_NAME'	=> $this->user->lang['CK_VE_COORDINATES'],
					'CK_VE_EXIF_VALUE'	=>  $lat_prefix_letter . ' ' . $lat_d . ' ' . $lat_m . ' ' . $lat_s . '/ ' . $lon_prefix_letter . ' ' . $lon_d . ' ' . $lon_m . ' ' . $lon_s,

			);

			if ($use_mapservice)
			{
				$mapservice = $this->user->data['ck_ve_mapservice'];
				$lang_mapservice = $this->user->lang['CK_VE_'.strtoupper($mapservice)];
				switch ($mapservice)
				{
					case 'osm':
						$targeturl  = 'https://www.openstreetmap.org/?';
						$targeturl .= '&mlat='.$lat_prefix_plus.$lat_dec;
						$targeturl .= '&mlon='.$lon_prefix_plus.$lon_dec;
						$targeturl .= '#map=17';
						$targeturl .= '/'.$lat_prefix_plus.$lat_dec;
						$targeturl .= '/'.$lon_prefix_plus.$lon_dec;
						$targeturl .= '&layers=M';
						break;
					case 'googlemaps':
					default:

						$targeturl  = 'https://maps.google.com/maps?';
						$targeturl .= 'q=';
						$targeturl .= $lat_prefix_letter.$lat_dec;
						$targeturl .= ',';
						$targeturl .= $lon_prefix_letter.$lon_dec;
						$targeturl .= '&z=17';
						break;
					}
					$targetlink = '<a href="'.$targeturl.'" target="CK_VE_MAP">'.$this->user->lang['CK_VE_CLICK_HERE'].'</a>';
					$exif_data[] = array(
						'CK_VE_EXIF_NAME'	=>$lang_mapservice,
						'CK_VE_EXIF_VALUE'	=>$targetlink,
					);
			}
		}

		$block_array += array(
			'CK_VE_EXIFS'			=> $exif_data,
			'S_CK_VE_HAS_EXIF'		=> (!empty($exif_data)) ? true : false,
			// we need a unique identifier for show/hide-function in template, just use the unique attach_id
			'CK_VE_ATTACH_ID'			=> "hide".$attachment['attach_id'],
		);

		$event['block_array'] = $block_array;

	}

}

/**
 * Initialize default exif display settings for new forums.
 *
 * @param \phpbb\event\data $event Forum edit form data.
 *
 * @return void
 */
public function ck_ve_acp_manage_forums_init($event)
{
	$forum_data = $event['forum_data'];

	if ($event['action'] == 'add' && !$event['update'])
	{
		$forum_data['ck_ve_show']	= 1;
	}

	$event['forum_data'] = $forum_data;
}

/**
 * Format exif display settings for forum edit form.
 *
 * @param \phpbb\event\data $event Forum edit form data.
 *
 * @return void
 */
public function ck_ve_acp_manage_forums_form($event)
{
	$template_data = $event['template_data'];
	$forum_data = $event['forum_data'];

	$template_data = array_merge($template_data, array(
			'S_FORUM_CK_VE_SHOW' => $forum_data['ck_ve_show'],
	));

	$event['template_data'] = $template_data;
}

/**
 * Process exif display settings form request data.
 *
 * @param \phpbb\event\data $event Forum form request data.
 *
 * @return void
 */
public function ck_ve_acp_manage_forums_data($event)
{
	$forum_data = $event['forum_data'];

	$forum_data = array_merge($forum_data, array(
			'ck_ve_show' => $this->request->variable('ck_ve_show', 1),
	));

	$event['forum_data'] = $forum_data;
}




private function ck_ve_calc_array($v1 = 0, $v2 = 0)
{
	// sanitize vars
	$r1 = 0;
	$v1 = 0 + $v1;
	$v2 = 0 + $v2;
	// no division by zero
	if ($v2 == 0)
	{
		$r1 = $v1;
	}
	else
	{
		$r1 = $v1 / $v2;
	}
	return $r1;

}

}
