<?php

namespace Rodney\Utils;

use Rodney\Models\User;

class Auth
{
	public static function hash(string $password): string
	{
		return password_hash($password, PASSWORD_BCRYPT);
	}

	public static function checkPassword(string $password, string $hash): bool
	{
		return password_verify($password, $hash);
	}

	public static function isUserLoggedIn(): bool
	{
		return isset($_SESSION['email']);
	}

	public static function login(string $email, string $password): bool
	{
		$user = User::where('email', $email)->first();

		if (!isset($user->password)) return false;

		if (!Auth::checkPassword($password, $user->password)) return false;

		$_SESSION['email'] = $user->email;

		return true;
	}

	public static function logout()
	{
		unset($_SESSION['email']);
	}

	public static function getLoggedInUser()
	{
		if (!isset($_SESSION['email'])) return false;

		$email = $_SESSION['email'];

		return User::where('email', $email)->first();
	}
}