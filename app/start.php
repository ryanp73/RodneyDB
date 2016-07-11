<?php

namespace Rodney;

session_start();

require_once './vendor/autoload.php';

use Rodney\Database\Connection;
use Rodney\Config\Config;

use \Illuminate\Database\Capsule\Manager as Capsule;

$c = Config::setup();
	
$app = new \Slim\App($c);

new Connection;

$app->db = new Capsule;

require_once './app/routes/base.routes.php';

$app->run();