View Exif
===========
viewexif display some exif data for attached images. It will not work for images linked from other sources using the bbCode [img] or for images in signatures, avatars etc.


## Requirements
* phpBB 3.1.6-RC1 or higher
* PHP 5.3.3 or higher


## Quick Installation
(Availiable when published in the extensions DB)

You can quickly install this extension on the latest version of [phpBB 3.1 or phpBB 3.2](https://www.phpbb.com/downloads/) or on the latest development version of [phpBB 3.1-dev or phpBB 3.2-dev](https://github.com/phpbb/phpbb3) by doing the following:

1. Upload the extension with "[Upload Extensions](https://github.com/BoardTools/upload)".
2. Check that you have uploaded the correct files.
3. Click `Enable`.

## Standard Installation
You can install this extension on the latest version of [phpBB 3.1 or phpBB 3.2](https://www.phpbb.com/downloads/) or on the latest development version of [phpBB 3.1-dev or phpBB 3.2-dev](https://github.com/phpbb/phpbb3) by doing the following:

1. Download the extension. You can do it by downloading the [latest ZIP-archive of 1.0.3 release](http://download.canonknipser.com/canonknipser_viewexif_1_0_3.zip).
2. Check out the existence of the folder `/ext/canonknipser/viewexif/` in the root of your board folder. Create folders if necessary.
3. Copy the contents of the downloaded `viewexif` folder to `/ext/canonknipser/viewexif/`.
4. Navigate in the ACP to `Customise -> Extension Management -> Manage extensions -> Show exif data`.
5. Click `Enable`.

## Usage

Simple visit some attached images at your board. It will show you exif data, if they are contained in the image.

This extension uses the buildin php exif library, to keep it as simple as possible.
Currently, following exif data will show up, if present:

1. DateTimeOriginal (transformed to user's chosen date/time-format)
2. Focal length
3. Exposure time
4. Aperture (f-Stop-Number)
5. ISO speed rating
6. White balance
7. Flash information
8. Camera maker and model
9. Exposure program
10. Exposure bias
11. Metering mode
12. Link to photo position on google maps


## Update from previous versions
1. Download the updated extension (See link above under "Installation").
2. Navigate in the ACP to `Customise -> Extension Management -> Manage extensions -> Show exif data` and click `Disable`.
3. Copy the contents of the downloaded zip file  to `/ext/canonknipser/viewexif/`.
4. Navigate in the ACP to `Customise -> Extension Management -> Manage extensions -> Show exif data` and click `Enable`.
5. Click `Details` or `Re-Check all versions` link to follow updates.

## Uninstallation
Navigate in the ACP to `Customise -> Extension Management -> Manage extensions -> Show exif data` and click `Disable`.

For permanent uninstallation click `Delete Data` and then you can safely delete the `/ext/canonknipser/viewexif/` folder.

## License
[GNU General Public License v2](http://opensource.org/licenses/GPL-2.0)

If you like this extension, feel free to [donate my work](https://www.paypal.me/FJakobs2105)

© 2016-2017 - Frank Jakobs [My account at github](https://github.com/canonknipser)

extension based on the 3.0.x-mod [NV Exif Data](https://www.phpbb.com/community/viewtopic.php?t=1107475) by [nickvergessen](https://www.phpbb.com/community/memberlist.php?mode=viewprofile&u=315319) 
