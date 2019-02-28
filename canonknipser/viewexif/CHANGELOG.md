# Changelog

(newest entries on top)

## 1.1.2 2017-12-13
### issues solved

- [Issue #21: naming of acp info files](https://github.com/canonknipser/viewexif/issues/21)

- [Issue #20: missing translations for "n.a."](https://github.com/canonknipser/viewexif/issues/20)

- [Issue #19: remove 3rd parameter from "config.update"](https://github.com/canonknipser/viewexif/issues/19)


## 1.1.1 2017-09-27
### issues solved

- [Issue #18: changed behavior of list-function](https://github.com/canonknipser/viewexif/issues/18)

- fixed additional validation issues

- minor glitch with style fixed



## 1.1.0 2017-09-17
### issues solved

- [Issue #16: solve validation issues from 1.0.3](https://github.com/canonknipser/viewexif/issues/16)

	-  config/services.yml
		- %core.root_path%
		Line 8: please also put this parameter into quotes, like you already did with the service arguments.

	- event/main_listener.php
		* @param \phpbb\config	$config		Config object
		Line 44: you probably meant `\phpbb\config\config `here.

	- Please remove the  large block of commented code, lines 311-359.
- [Issue #14: Enhanced error message on enable](https://github.com/canonknipser/viewexif/issues/14)

- [Issue #2: UCP component](https://github.com/canonknipser/viewexif/issues/2)

- [Issue #1: GPS-Links to other map services](https://github.com/canonknipser/viewexif/issues/1)

	- google maps
	- open street maps

### new features


- new acp module
- new ucp module
- added new language variables in viewexif.php
- added a few new language files

	- viewexif_acp.php
	- info_acp_ck_ve.php
	- info_ucp_ck_ve.php

- new language *de_x_sie* (German formal honorific)

## 1.0.3-RC - 2017-02-23
### issues solved

- fixed issue #13 [Load css only for pages containing attachments](https://github.com/canonknipser/viewexif/issues/13)
- fixed issue #12 ["Division by zero" on calculation GPS coordinates](https://github.com/canonknipser/viewexif/issues/12)
- fixed issue #11 [Change cursor to "pointer" on "show/hide"](https://github.com/canonknipser/viewexif/issues/11)
- fixed issue #9 [Check, if php-exif is installed](https://github.com/canonknipser/viewexif/issues/9)
- updated README.md

## 1.0.2-RC - 2016-12-05
### issues solved

- fixed issue #8 [Wrong ISO speed rating from Samsung Mobile](https://github.com/canonknipser/viewexif/issues/8)

## 1.0.1-RC - 2016-11-01
### issues solved

- fixed issues found by validation team
- updated requirements (based on needed events)

## 1.0.0-RC - 2016-06-05
### issues solved


- changed image type detection to mimetype
- added tiff support (untestet)
- use user's timezone data to calculate image datetime based on user display format preferences

## 1.0.0-beta2 - 2016-05-31

- styling (used div-based tables, font-styling modified, show/hide exif-data by click)
- added Camera Manufacturer
- added credits

## 1.0.0-beta1 - 2016-05-28

- First release
