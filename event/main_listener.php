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
		'core.user_setup'								=> 'load_language_on_setup',
		'core.parse_attachments_modify_template_data'	=> 'get_exif_data',
	);
}

/* @var \phpbb\controller\helper */
protected $helper;

/* @var \phpbb\template\template */
protected $template;

/* @var \phpbb\user */
protected $user;

/**
	* Constructor
	*
	* @param \phpbb\controller\helper $helper
	* @param \phpbb\template\template $template
	* @param \phpbb\config	$config		Config object
	* @param string			$root_path	phpBB root path
	* @param \phpbb\user	$user		user object

 */
public function __construct(\phpbb\controller\helper $helper, \phpbb\template\template $template, \phpbb\config\config $config, $root_path, \phpbb\user $user)
{
	$this->helper = $helper;
	$this->template = $template;
	$this->config = $config;
	$this->root_path = $root_path;
	$this->user = $user;

}

public function load_language_on_setup($event)
{
	$lang_set_ext = $event['lang_set_ext'];
	$lang_set_ext[] = array(
		'ext_name' => 'canonknipser/viewexif',
		'lang_set' => 'viewexif',
	);
	$event['lang_set_ext'] = $lang_set_ext;
}

public function get_exif_data($event)
{
	$attachment = $event['attachment'];
	$block_array = $event['block_array']; // Template data of the attachment
	$display_cat = $event['display_cat']; // Attachment category data
	$download_link = $event['download_link']; // Attachment download link
	$extensions = $event['extensions']; // Array with attachment extensions data
	$forum_id = $event['forum_id']; // The forum id the attachments are displayed in (false if in private message)
	$preview= $event['preview']; // Flag indicating if we are in post preview mode
	$update_count = $event['update_count']; // Array with attachment ids to update download count
/*
	echo "attachment<br>";
	print_r($attachment);
	echo "<br>-------------<br>";
	echo "block_array<br>";
	print_r($block_array);
	echo "<br>-------------<br>";
	echo "display_cat<br>";
	print_r($display_cat);
	echo "<br>-------------<br>";
	echo "extensions<br>";
	print_r($extensions);
	echo "<br>-------------<br>";
	echo "forum_id<br>";
	print_r($forum_id);
	echo "<br>-------------<br>";
	echo "update_count<br>";
	print_r($update_count);
	echo "<br>-------------<br>";
*/
	// we need the complete physical_filename for reading exif-data:
	$filename = $this->root_path . $this->config['upload_path'] . '/' . utf8_basename($attachment['physical_filename']);
	//echo "$filename<br>";

	$use_google = true;

	// we use mimetype here - and support tiff
	$exif = ($attachment['mimetype'] == 'image/jpeg' || $attachment['mimetype'] == 'image/tiff') ? @exif_read_data($filename, 0, true) : array();
	$exif_data = array();
	if (!empty($exif["EXIF"]))
	{
		// We got some data
		if (isset($exif["EXIF"]["DateTimeOriginal"]))
		{
			$timestamp_year   = 0 + substr($exif["EXIF"]["DateTimeOriginal"], 0, 4);
			$timestamp_month  = 0 + substr($exif["EXIF"]["DateTimeOriginal"], 5, 2);
			$timestamp_day    = 0 + substr($exif["EXIF"]["DateTimeOriginal"], 8, 2);
			$timestamp_hour   = 0 + substr($exif["EXIF"]["DateTimeOriginal"], 11, 2);
			$timestamp_minute = 0 + substr($exif["EXIF"]["DateTimeOriginal"], 14, 2);
			$timestamp_second = 0 + substr($exif["EXIF"]["DateTimeOriginal"], 17, 2);
			$timestamp        = mktime($timestamp_hour, $timestamp_minute, $timestamp_second, $timestamp_month, $timestamp_day, $timestamp_year);
			// we need to respect the timezone from user's profile, so we need to calculate the diff between user timezone and UTC
			$date_time_zone_UTC = new \DateTimeZone("UTC");
			$date_time_zone_user = new \DateTimeZone($this->user->data['user_timezone']);

			// Create DateTime object for timestamp from Image with UTC timezone
			$date_time_UTC = new \DateTime("@$timestamp", $date_time_zone_UTC);

			// Calculate the UTC offset for the date/time contained in the $date_time_zone_user (given in seconds)

			$time_offset = $date_time_zone_user->getOffset($date_time_UTC);
/*
			$exif_data[] = array(
				'CK_VE_EXIF_NAME' => 'TIMEZONEDIFF',
				'CK_VE_EXIF_VALUE' => $time_offset,
			);
*/
			$exif_data[] = array('CK_VE_EXIF_NAME' => $this->user->lang['CK_VE_EXIF_DATE'], 'CK_VE_EXIF_VALUE' => $this->user->format_date($timestamp - $time_offset, false, true));
		}
		if (isset($exif["EXIF"]["FocalLength"]))
		{
			list($num, $den) = explode("/", $exif["EXIF"]["FocalLength"]);
			$exif_data[] = array('CK_VE_EXIF_NAME' => $this->user->lang['CK_VE_EXIF_FOCAL'], 'CK_VE_EXIF_VALUE' => sprintf($this->user->lang['CK_VE_EXIF_FOCAL_EXP'], ($num/$den)));
		}
		if (isset($exif["EXIF"]["ExposureTime"]))
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
			$exif_data[] = array('CK_VE_EXIF_NAME' => $this->user->lang['CK_VE_EXIF_EXPOSURE'], 'CK_VE_EXIF_VALUE' => sprintf($this->user->lang['CK_VE_EXIF_EXPOSURE_EXP'], $exif_exposure));
		}
		if (isset($exif["EXIF"]["FNumber"]))
		{
			list($num, $den) = explode("/", $exif["EXIF"]["FNumber"]);
			if ($den > 0)
			{
				$exif_data[] = array('CK_VE_EXIF_NAME' => $this->user->lang['CK_VE_EXIF_APERTURE'], 'CK_VE_EXIF_VALUE' => "f/" . ($num/$den));
			}
			else
			{
				$exif_data[] = array('CK_VE_EXIF_NAME' => $this->user->lang['CK_VE_EXIF_APERTURE'], 'CK_VE_EXIF_VALUE' => "f/??");
			}
		}
		if (isset($exif["EXIF"]["ISOSpeedRatings"]))
		{
			$exif_data[] = array('CK_VE_EXIF_NAME' => $this->user->lang['CK_VE_EXIF_ISO'], 'CK_VE_EXIF_VALUE' => htmlspecialchars($exif["EXIF"]["ISOSpeedRatings"]));
		}
		if (isset($exif["EXIF"]["WhiteBalance"]))
		{
			$exif_data[] = array('CK_VE_EXIF_NAME' => $this->user->lang['CK_VE_EXIF_WHITEB'], 'CK_VE_EXIF_VALUE' => $this->user->lang['CK_VE_EXIF_WHITEB_' . (($exif["EXIF"]["WhiteBalance"]) ? 'MANU' : 'AUTO')]);
		}
		if (isset($exif["EXIF"]["Flash"]))
		{
			if (isset($this->user->lang['CK_VE_EXIF_FLASH_CASE_' . $exif["EXIF"]["Flash"]]))
			{
				$exif_data[] = array('CK_VE_EXIF_NAME' => $this->user->lang['CK_VE_EXIF_FLASH'], 'CK_VE_EXIF_VALUE' => $this->user->lang['CK_VE_EXIF_FLASH_CASE_' . $exif["EXIF"]["Flash"]]);
			}
		}
		if (isset($exif["IFD0"]["Make"]))
		{
			$exif_data[] = array('CK_VE_EXIF_NAME' => $this->user->lang['CK_VE_EXIF_CAM_MAKE'], 'CK_VE_EXIF_VALUE' => htmlspecialchars(ucwords($exif["IFD0"]["Make"])));
		}
		if (isset($exif["IFD0"]["Model"]))
		{
			$exif_data[] = array('CK_VE_EXIF_NAME' => $this->user->lang['CK_VE_EXIF_CAM_MODEL'], 'CK_VE_EXIF_VALUE' => htmlspecialchars(ucwords($exif["IFD0"]["Model"])));
		}
		if (isset($exif["EXIF"]["ExposureProgram"]))
		{
			if (isset($this->user->lang['CK_VE_EXIF_EXPOSURE_PROG_' . $exif["EXIF"]["ExposureProgram"]]))
			{
				$exif_data[] = array('CK_VE_EXIF_NAME' => $this->user->lang['CK_VE_EXIF_EXPOSURE_PROG'], 'CK_VE_EXIF_VALUE' => $this->user->lang['CK_VE_EXIF_EXPOSURE_PROG_' . $exif["EXIF"]["ExposureProgram"]]);
			}
		}
		if (isset($exif["EXIF"]["ExposureBiasValue"]))
		{
			list($num,$den) = explode("/",$exif["EXIF"]["ExposureBiasValue"]);
			if (($num/$den) == 0)
			{
				$exif_exposure_bias = 0;
			}
			else
			{
				$exif_exposure_bias = $exif["EXIF"]["ExposureBiasValue"];
			}
			$exif_data[] = array('CK_VE_EXIF_NAME' => $this->user->lang['CK_VE_EXIF_EXPOSURE_BIAS'], 'CK_VE_EXIF_VALUE' => htmlspecialchars(sprintf($this->user->lang['CK_VE_EXIF_EXPOSURE_BIAS_EXP'], $exif_exposure_bias)));
		}
		if (isset($exif["EXIF"]["MeteringMode"]))
		{
			if (isset($this->user->lang['CK_VE_EXIF_METERING_MODE_' . $exif["EXIF"]["MeteringMode"]]))
			{
				$exif_data[] = array('CK_VE_EXIF_NAME' => $this->user->lang['CK_VE_EXIF_METERING_MODE'], 'CK_VE_EXIF_VALUE' => $this->user->lang['CK_VE_EXIF_METERING_MODE_' . $exif["EXIF"]["MeteringMode"]]);
			}
		}

		if (isset($exif['GPS']['GPSLatitude']))
		{
			// we have GPS data, extract the numeric values for degree, minute, second
			$lat = $exif['GPS']['GPSLatitude'];

			list($num, $dec) = explode('/', $lat[0]);
			$lat_s = $num / $dec;

			list($num, $dec) = explode('/', $lat[1]);
			$lat_m = $num / $dec;

			list($num, $dec) = explode('/', $lat[2]);
			if ($dec != 0)
			{
				$lat_v = $num / $dec;
			}
			// calculate decimal value for latidude, eg for google maps
			$lat_dec = $lat_s + ($lat_m / 60.0) + ($lat_v / 3600.0);

					$lat_ref = $exif['GPS']['GPSLatitudeRef'];
			if ($lat_ref == 'S')
			{
				$lat_prefix = 'S';
			}
			else
			{
				$lat_prefix = 'N';
			}

			$lon = $exif['GPS']['GPSLongitude'];

			list($num, $dec) = explode('/', $lon[0]);
			$lon_s = $num / $dec;

			list($num, $dec) = explode('/', $lon[1]);
			$lon_m = $num / $dec;

			list($num, $dec) = explode('/', $lon[2]);
			if ($dec != 0)
			{
				$lon_v = $num / $dec;
			}

			// calculate decimal value for latidude, eg for google maps
			$lon_dec = $lon_s  + ($lon_m / 60.0) + ($lon_v / 3600.0);

			$lon_ref = $exif['GPS']['GPSLongitudeRef'];
			if ($lon_ref == 'E')
			{
				$lon_prefix = 'E';
			}
			else
			{
				$lon_prefix = 'W';
			}


			if ($use_google)
			{
				$google_url = 'https://maps.google.com/maps?q=';
				$google_zoom = '&z=17';
				$targeturl = $google_url.$lat_prefix.$lat_dec.','.$lon_prefix.$lon_dec.$google_zoom;
				$targetlink = '<a href="'.$targeturl.'" target="CK_VE_gps">'.$this->user->lang['CK_VE_CLICK_HERE'].'</a>';
				$exif_data[] = array('CK_VE_EXIF_NAME' =>$this->user->lang['CK_VE_NAME_MAPSERVICE'], 'CK_VE_EXIF_VALUE' =>$targetlink);
			}
		}

		$block_array += array(
		'CK_VE_exifs'			=> $exif_data,
		'S_CK_VE_HAS_EXIF'		=> (!empty($exif_data)) ? true : false,
		// we need a unique identifier for show/hid-function in template, just use the unique attach_id
		'CK_VE_ATTACH_ID'			=> "hide".$attachment['attach_id'],
		);

		$event['block_array'] = $block_array;

	}


}

}
