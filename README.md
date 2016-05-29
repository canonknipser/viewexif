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
4. Navigate in the ACP to `Customise -> Extension Management -> Manage extensions -> Cron Status`.
5. Click `Enable`.

## Usage
### Nothing to do
Simpke visit some attached images at your borad. It will show use some exif data

## Update
1. Download the updated extension. You can do itby downloading the [latest ZIP-archive of `master` branch of its GitHub repository](https://github.com/canonknipser/viewexif/archive/master.zip).
2. Navigate in the ACP to `Customise -> Extension Management -> Manage extensions -> View Exif` and click `Disable`.
3. Copy the contents of the downloaded `cronstatus-master` folder to `/ext/canonknipser/viewexif/`.
4. Navigate in the ACP to `Customise -> Extension Management -> Manage extensions -> View Exif` and click `Enable`.
5. Click `Details` or `Re-Check all versions` link to follow updates.

## Uninstallation
Navigate in the ACP to `Customise -> Extension Management -> Manage extensions -> View Exif` and click `Disable`.

For permanent uninstallation click `Delete Data` and then you can safely delete the `/ext/canonknipser/viewexif/` folder.

## License
[GNU General Public License v2](http://opensource.org/licenses/GPL-2.0)

© 2014 - John Peskens (http://ForumHulp.com) and Igor Lavrov (https://github.com/LavIgor)
