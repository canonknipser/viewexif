# ToDo list


## Release plan
### Release 1.1.0
- [Issue #1: GPS-Links to other map services](https://github.com/canonknipser/viewexif/issues/1)

	- google maps
	- open street maps

- [Issue #2: UCP component](https://github.com/canonknipser/viewexif/issues/2)


- [Issue #14: Enhanced error message on enable](https://github.com/canonknipser/viewexif/issues/14)


- [Issue #16: solve validation issues from 1.0.3](https://github.com/canonknipser/viewexif/issues/16)

	-  config/services.yml
		- %core.root_path%
		Line 8: please also put this parameter into quotes, like you already did with the service arguments.

	- event/main_listener.php
		* @param \phpbb\config	$config		Config object
		Line 44: you probably meant `\phpbb\config\config `here.

	- Please remove the  large block of commented code, lines 311-359.

## other open issues

- [Issue #3: image attachements: variable grayscale background](https://github.com/canonknipser/viewexif/issues/3)

- [Issue #10: exif statistic](https://github.com/canonknipser/viewexif/issues/3)

- [Issue #15: switch to pel](https://github.com/canonknipser/viewexif/issues/15)

