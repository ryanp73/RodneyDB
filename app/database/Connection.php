<?php

namespace Rodney\Database;

use \Illuminate\Database\Capsule\Manager as Capsule;

use Rodney\Config\Config;

class Connection
{
	public function __construct() {
		$capsule = new Capsule;

		$capsule->addConnection([
		    "driver" => Config::DB_DRIVER,
		    "host" => Config::DB_HOST,
		    "database" => Config::DB_DATABASE,
		    "username" => Config::DB_USERNAME,
		    "password" => Config::DB_PASSWORD,
		    "charset" => Config::DB_CHARSET,
		    "collation" => Config::DB_COLLATION,
		    "prefix" => Config::DB_PREFIX,
		]);

		$capsule->setAsGlobal();

		$capsule->bootEloquent();
	}
}

