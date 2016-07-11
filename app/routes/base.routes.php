<?php

namespace Rodney\Routes;

use Rodney\Utils\Auth;
use Rodney\Models\User;

$app->get('/', function($req, $res, $args) {
	$this->view->render($res, 'home.html', [
		'title' => 'Rodney :: Home',
		'loggedIn' => Auth::isUserLoggedIn(),
		'user' => Auth::getLoggedInUser()
	]);
});

$app->get('/failure', function($req, $res, $args) {
	$this->view->render($res, 'failure.html', [
		'title' => 'Rodney :: Failure'
	]);
});

$app->get('/login', function($req, $res, $args) {
	$this->view->render($res, 'login.html', [
		'title' => 'Rodney :: Login'
	]);
});

$app->post('/login', function($req, $res, $args) {
	$baseUrl = explode('/', trim($_SERVER['PHP_SELF'], '/'))[0];
	if (Auth::login($_POST['email'], $_POST['password']))
	{
		return $res->withStatus(302)->withHeader('Location', '/' . $baseUrl . '/');
	}
	else 
	{
		return $res->withStatus(302)->withHeader('Location', '/' . $baseUrl . '/failure');
	}
});

$app->get('/logout', function($req, $res, $args) {
	$baseUrl = explode('/', trim($_SERVER['PHP_SELF'], '/'))[0];
	Auth::logout();
	return $res->withStatus(302)->withHeader('Location', '/' . $baseUrl);
});

$app->get('/register', function($req, $res, $args) {
	$this->view->render($res, 'register.html', [
		'title' => 'Rodney :: Register',
		'js' => 'register'
	]);
});

$app->post('/register', function($req, $res, $args) {
	$baseUrl = explode('/', trim($_SERVER['PHP_SELF'], '/'))[0];
	$user = new User;
	$user->first_name 	= $_POST['firstName'];
	$user->last_name  	= $_POST['lastName'];
	$user->email 	  	= $_POST['email'];
	$user->password   	= Auth::hash($_POST['password']);
	$user->grade 	  	= $_POST['grade'];
	$user->school 	  	= $_POST['school'];
	$user->student_id 	= $_POST['studentId'];
	$user->phone_number = $_POST['phone'];
	$user->pref_contact = $_POST['preferred'];
	$user->save();
	return $res->withStatus(302)->withHeader('Location', '/' . $baseUrl);
});

$app->get('/checkin', function($req, $res, $args) {
	$this->view->render($res, 'checkin.html', [
		'title' => 'Rodney :: Checkin',
		'js' => 'checkin'
	]);
});

$app->post('/checkin', function($req, $res, $args) {
	$studentId = $_POST['si'];
	$user = User::where('student_id', (int)$studentId)->get()->first();

	if (!$user) 
	{
		$data = array('res' => 'invalid');
	} 
	else if (!$user->checked_in) 
	{
		$user->checked_in = true;
		$user->last_check_in = new \DateTime;
		$user->save();
		$data = array('res' => 'checkin');
	}
	else if ($user->checked_in)
	{
		$now = new \DateTime;
		$lci = new \DateTime($user->last_check_in);
		$diff = $now->getTimestamp() - $lci->getTimestamp();
		
		$user->hours += $diff / 3600;
		$user->checked_in = false;
		$user->last_check_in = new \DateTime();
		$user->save();
		$data = array('res' => 'checkout', 'name' => $user->full_name(), 'hours' => $user->hours);
	}

	$response = $res->withJson($data);
});