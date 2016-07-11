# Rodney 3.0.0

Team management system for FRC Team 2410, the Metal Mustangs

Rodney is our main source of contact within our team with the ability to text members from the site.
It is also works to log the number of hours a member is at meetings. 

This is currently version 3 of Rodney being written primarily by Ryan Pope <poperyan73@gmail.com>.
The goal is to create a more maintainable site for future members of the team to more easily maintain.

## Using Rodney 

To install, clone the repo. You will need to run `composer install` to install all dependencies.
You will need to set up a config file in the `app/config` directory. 
This code is configured to work with MySQL. 
Other database drivers may require different implementations.

#### Settings.php
```php
<?php

namespace Rodney\Config;

class Settings
{
	const DB_DRIVER = '';
	const DB_HOST = '';
	const DB_DATABASE = '';
	const DB_USERNAME = '';
	const DB_PASSWORD = '';
	const DB_CHARSET = 'utf8';
	const DB_COLLATION = 'utf8_unicode_ci';
	const DB_PREFIX = '';
	
	const TEMPLATE_PATH = './app/templates';
	
	const SHOW_ERRORS = false;

	
}