# Technical dokumentation
This document contains technical information for the "viewexif"-Extension, which shows exifs information for attached imgages in phpBB
## Basic information
### Namespaces
Whenever possible, a element name starts with (or contains) the abbrevated vendor name ("*ck*" for canonknipser), followed by the abbrevated extension name ("*ve*" for viewexif), delimited by dashes ("*_*").

## Database Updates
### Table users
- new column ck\_ve\_mapservice

	- datatype varchar(255)
	- default "googlemaps"
	- contains the user's choice for the mapservice which should be called when showing gps data in images
- new column ck\_ve\_active

	- datatype boolean
	- default true
	- contains the user's choice if exif data should be shown
	
### Config variables
- ck\_ve\_active\_global

	- datatype boolean
	- default true
	- global on/off-Switch for viewexif
	
- ck\_ve\_use\_maps

	- datatype boolean
	- default true
	- global on/off-Switch for map data

- ck\_ve\_version

	- datatype string
	- current version number
	- set during migration

	*following variable names should be self explaing, all of type boolean*
	 
- ck\_ve\_allow\_date
	 
- ck\_ve\_allow\_focal\_length
	 
- ck\_ve\_allow\_exposure\_time
	 
- ck\_ve\_allow\_f\_number
	 
- ck\_ve\_allow\_iso

- ck\_ve\_allow\_wb

- ck\_ve\_allow\_flash

- ck\_ve\_allow\_make

- ck\_ve\_allow\_model

- ck\_ve\_allow\_exposure\_prog

- ck\_ve\_allow\_exposure\_bias

- ck\_ve\_allow\_metering

- ck\_ve\_allow\_gps

## User Control Panel
- new register UCP\_CK\_VE\_TITLE
- new module

Gives a user the possibility to choose if he wants to display exif data for attached elements. If a element contains GPS coordinates, he can choose which map service he wants to use for showing the image shot position. Currently, following map services are implemented:
- Google Maps
- Open Street Maps

## Administrator Control Panel
- new register ACP\_CK\_VE\_TITLE
- new module

Gives a board adminsitrator the possibility to choose if he wants users to be able to see exif data for images and if a image contains GPS coordinates, if they can be used to provide a link to a user chooseable map service.

## planned features and changes
### database
- new table with allowed map services, should be configured via acp

	- entry name
	- link adress
	- gps coordinate format (decimal; degrees, minutes, seconds;north/south/east/west, +/-) 
- language entries for map services
- add option per forum, if exif data should be displayed
- add option per image, if exif data should be displayed

	