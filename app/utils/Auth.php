<?php

namespace Rodney\Utils;

class Auth
{
	public static function hash(string $password): string
	{
		return password_hash($password, PASSWORD_BCRYPT);
	}
}