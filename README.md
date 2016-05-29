View Exif
===========
viewexif display some exif data for attached images

[![Build Status](https://travis-ci.org/canonknipser/viewexif.svg?branch=master)](https://travis-ci.org/canonknipser/viewexif)

## Requirements
* phpBB 3.1.0 or higher
* PHP 5.3.3 or higher


## Quick Installation
You can quickly install this extension on the latest version of [phpBB 3.1](https://www.phpbb.com/downloads/) or on the latest development version of [phpBB 3.1-dev](https://github.com/phpbb/phpbb3) by doing the following:

1. Upload the extension with "[Upload Extensions](https://github.com/BoardTools/upload)".
2. Check that you have uploaded the correct files.
3. Click `Enable`.

## Standard Installation
You can install this extension on the latest version of [phpBB 3.1](https://www.phpbb.com/downloads/) or on the latest development version of [phpBB 3.1-dev](https://github.com/phpbb/phpbb3) by doing the following:

1. Download the extension. You can do it by downloading the [latest ZIP-archive of `master` branch of its GitHub repository](https://github.com/canonknipser/viewexif/archive/master.zip).
2. Check out the existence of the folder `/ext/canonknipser/viewexif/` in the root of your board folder. Create folders if necessary.
3. Copy the contents of the downloaded `viewexif-master` folder to `/ext/canonknipser/viewexif/`.
4. Navigate in the ACP to `Customise -> Extension Management -> Manage extensions -> Show exif data`.
5. Click `Enable`.

## Usage
### Nothing to do
Simple visit some attached images at your borad. It will show use some exif data.
This extension uses the buildin php exif library, to keep it as simple as possible.
Currently, following exif data will show up, if present:
1. DateTimeOriginal (transformed to user's chosen date/time-format)
2. Focal length
3. Exposure time
4. Aperture (f-Stop-Number)
5. ISO speed rating
6. White balance
7. Flash information
8. Camera model
9. Exposure program
10. Exposure bias
11. Metering mode
12. Link to photo position on google maps


## Update
1. Download the updated extension. You can do itby downloading the [latest ZIP-archive of `master` branch of its GitHub repository](https://github.com/canonknipser/viewexif/archive/master.zip).
2. Navigate in the ACP to `Customise -> Extension Management -> Manage extensions -> Show exif data` and click `Disable`.
3. Copy the contents of the downloaded `cronstatus-master` folder to `/ext/canonknipser/viewexif/`.
4. Navigate in the ACP to `Customise -> Extension Management -> Manage extensions -> Show exif data` and click `Enable`.
5. Click `Details` or `Re-Check all versions` link to follow updates.

## Uninstallation
Navigate in the ACP to `Customise -> Extension Management -> Manage extensions -> Show exif data` and click `Disable`.

For permanent uninstallation click `Delete Data` and then you can safely delete the `/ext/canonknipser/viewexif/` folder.

## License
[GNU General Public License v3](http://opensource.org/licenses/GPL-3.0)

© 2016 - Frank Jakobs (https://github.com/canonknipser)
