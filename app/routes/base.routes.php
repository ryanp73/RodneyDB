<?php

namespace Rodney\Routes;

use Rodney\Models\User;

$app->get('/', function($req, $res, $args) {
	$this->view->render($res, 'home.html', [
		'title' => 'Rodney :: Home'	
	]);
});