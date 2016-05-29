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
        'core.user_setup'  => 'load_language_on_setup',
        'core.parse_attachments_modify_template_data' => 'get_exif_data',
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

 */
public function __construct(\phpbb\controller\helper $helper, \phpbb\template\template $template, \phpbb\config\config $config,  $root_path, \phpbb\user $user)
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
/*
	attachment-fields
		attach_id (Primärschlüssel) 	mediumint(8)
		post_msg_id 					mediumint(8)
		topic_id 						mediumint(8)
		in_message 						tinyint(1)
		poster_id 						mediumint(8)
		is_orphan 						tinyint(1)
		physical_filename 				varchar(255)
		real_filename 					varchar(255)
		download_count 					mediumint(8)
		attach_comment 					text
		extension 						varchar(100)
		mimetype 						varchar(100)
		filesize 						int(20)
		filetime 						int(11)
		thumbnail 						tinyint(1)
*/
	$block_array = $event['block_array']; // Template data of the attachment
	$display_cat = $event['display_cat']; // Attachment category data
	$download_link = $event['download_link']; // Attachment download link
	$extensions = $event['extensions']; // Array with attachment extensions data
	$forum_id = $event['forum_id']; // The forum id the attachments are displayed in (false if in private message)
	$preview= $event['preview']; // Flag indicating if we are in post preview mode
	$update_count = $event['update_count']; // Array with attachment ids to update download count

	// we need the complete physical_filename for reading exif-data:
	$filename = $this->root_path . $this->config['upload_path'] . '/' . utf8_basename($attachment['physical_filename']);
	//echo "$filename<br>";

	// only for jpeg ...
	$exif = ($attachment['extension'] == 'jpg' || $attachment['extension'] == 'jpeg') ? @exif_read_data($filename, 0, true) : array();
	$exif_data = array();
	if (!empty($exif["EXIF"]))
	{
		// We got some data
//	echo "exif found<br>";
		if(isset($exif["EXIF"]["DateTimeOriginal"]))
		{
			$timestamp_year   = substr($exif["EXIF"]["DateTimeOriginal"], 0, 4);
			$timestamp_month  = substr($exif["EXIF"]["DateTimeOriginal"], 5, 2);
			$timestamp_day    = substr($exif["EXIF"]["DateTimeOriginal"], 8, 2);
			$timestamp_hour   = substr($exif["EXIF"]["DateTimeOriginal"], 11, 2);
			$timestamp_minute = substr($exif["EXIF"]["DateTimeOriginal"], 14, 2);
			$timestamp_second = substr($exif["EXIF"]["DateTimeOriginal"], 17, 2);
			$timestamp        = mktime($timestamp_hour, $timestamp_minute, $timestamp_second, $timestamp_month, $timestamp_day, $timestamp_year);
			$exif_data[] = array('EXIF_NAME' => $this->user->lang['VIEWEXIF_EXIF_DATE'], 'EXIF_VALUE' => $this->user->format_date($timestamp));
		}
		if(isset($exif["EXIF"]["FocalLength"]))
		{
			list($num, $den) = explode("/", $exif["EXIF"]["FocalLength"]);
			$exif_data[] = array('EXIF_NAME' => $this->user->lang['VIEWEXIF_EXIF_FOCAL'], 'EXIF_VALUE' => sprintf($this->user->lang['VIEWEXIF_EXIF_FOCAL_EXP'], ($num/$den)));
		}
		if(isset($exif["EXIF"]["ExposureTime"]))
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
			$exif_data[] = array('EXIF_NAME' => $this->user->lang['VIEWEXIF_EXIF_EXPOSURE'], 'EXIF_VALUE' => sprintf($this->user->lang['VIEWEXIF_EXIF_EXPOSURE_EXP'], $exif_exposure));
		}
		if(isset($exif["EXIF"]["FNumber"]))
		{
			list($num, $den) = explode("/", $exif["EXIF"]["FNumber"]);
			if ($den > 0)
			{
				$exif_data[] = array('EXIF_NAME' => $this->user->lang['VIEWEXIF_EXIF_APERTURE'], 'EXIF_VALUE' => "f/" . ($num/$den));
			}
			else
			{
				$exif_data[] = array('EXIF_NAME' => $this->user->lang['VIEWEXIF_EXIF_APERTURE'], 'EXIF_VALUE' => "f/??");
			}
		}
		if(isset($exif["EXIF"]["ISOSpeedRatings"]))
		{
			$exif_data[] = array('EXIF_NAME' => $this->user->lang['VIEWEXIF_EXIF_ISO'], 'EXIF_VALUE' => htmlspecialchars($exif["EXIF"]["ISOSpeedRatings"]));
		}
		if (isset($exif["EXIF"]["WhiteBalance"]))
		{
			$exif_data[] = array('EXIF_NAME' => $this->user->lang['VIEWEXIF_EXIF_WHITEB'], 'EXIF_VALUE' => $this->user->lang['VIEWEXIF_EXIF_WHITEB_' . (($exif["EXIF"]["WhiteBalance"]) ? 'MANU' : 'AUTO')]);
		}
		if(isset($exif["EXIF"]["Flash"]))
		{
			if (isset($this->user->lang['VIEWEXIF_EXIF_FLASH_CASE_' . $exif["EXIF"]["Flash"]]))
			{
				$exif_data[] = array('EXIF_NAME' => $this->user->lang['VIEWEXIF_EXIF_FLASH'], 'EXIF_VALUE' => $this->user->lang['VIEWEXIF_EXIF_FLASH_CASE_' . $exif["EXIF"]["Flash"]]);
			}
		}
		if (isset($exif["IFD0"]["Model"]))
		{
			$exif_data[] = array('EXIF_NAME' => $this->user->lang['VIEWEXIF_EXIF_CAM_MODEL'], 'EXIF_VALUE' => htmlspecialchars(ucwords($exif["IFD0"]["Model"])));
		}
		if (isset($exif["EXIF"]["ExposureProgram"]))
		{
			if (isset($this->user->lang['VIEWEXIF_EXIF_EXPOSURE_PROG_' . $exif["EXIF"]["ExposureProgram"]]))
			{
				$exif_data[] = array('EXIF_NAME' => $this->user->lang['VIEWEXIF_EXIF_EXPOSURE_PROG'], 'EXIF_VALUE' => $this->user->lang['VIEWEXIF_EXIF_EXPOSURE_PROG_' . $exif["EXIF"]["ExposureProgram"]]);
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
			$exif_data[] = array('EXIF_NAME' => $this->user->lang['VIEWEXIF_EXIF_EXPOSURE_BIAS'], 'EXIF_VALUE' => htmlspecialchars(sprintf($this->user->lang['VIEWEXIF_EXIF_EXPOSURE_BIAS_EXP'], $exif_exposure_bias)));
		}
		if (isset($exif["EXIF"]["MeteringMode"]))
		{
			if (isset($this->user->lang['VIEWEXIF_EXIF_METERING_MODE_' . $exif["EXIF"]["MeteringMode"]]))
			{
				$exif_data[] = array('EXIF_NAME' => $this->user->lang['VIEWEXIF_EXIF_METERING_MODE'], 'EXIF_VALUE' => $this->user->lang['VIEWEXIF_EXIF_METERING_MODE_' . $exif["EXIF"]["MeteringMode"]]);
			}
		}

		if(isset($exif['GPS']['GPSLatitude']))
		{
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

			$lat_ref = $exif['GPS']['GPSLatitudeRef'];
			if ($lat_ref == 'S')
			{
				$lat_prefix = 'S';
			}
			else
			{
				$lat_prefix = 'N';
			}
			$lon_ref = $exif['GPS']['GPSLongitudeRef'];
			if ($lon_ref == 'E')
			{
				$lon_prefix = 'E';
			}
			else
			{
				$lon_prefix = 'W';
			}

			$gps_int = array($lat_s + ($lat_m / 60.0) + ($lat_v / 3600.0), $lon_s  + ($lon_m / 60.0) + ($lon_v / 3600.0));
			//$gps_int = array($lat_prefix+$lat_s + $lat_m / 60.0 + $lat_v / 3600.0, $lon_prefix+$lon_s  + $lon_m / 60.0 + $lon_v / 3600.0);

			$targeturl = 'http://maps.google.com/maps?q='.$lat_prefix.$gps_int[0].','.$lon_prefix.$gps_int[1].'&z=17';
			$targetlink = '<a href="'.$targeturl.'" target="_blank">'.$this->user->lang['VIEWEXIF_CLICK_HERE'].'</a>';
			$exif_data[] = array('EXIF_NAME' =>"$this->user->lang['VIEWEXIF_NAME_MAPSERVICE']", 'EXIF_VALUE' =>$targetlink);
		}

		$block_array += array(
		'_exifs'			=> $exif_data,
		'S_HAS_EXIF'		=> (!empty($exif_data)) ? true : false,
		);

        $event['block_array'] = $block_array;
/*
		foreach ($event['block_array']['_exifs'] as $exifnam => $exifV)
		{
			foreach ($exifV as $exif1 => $exif2)
			{
				echo "a) $exifnam: $exif1: $exif2<br>";
			}
		}
*/
	}

/*
    $this->template->assign_vars(array(
		'VIEWEXIF_EXIFDATA'			=> $exif_data,
		'S_HAS_EXIF'		=> (!empty($exif_data)) ? true : false,
    ));
*/
	//var_dump($this->template);
}

}