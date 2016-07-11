<?php

namespace Rodney\Models;

use \Illuminate\Database\Eloquent\Model as Eloquent;

class User extends Eloquent
{
	public function guardians()
	{
		return $this->hasMany('Rodney\Models\Guardian');
	}

	public function full_name()
	{
		return $this->first_name . ' ' . $this->last_name;
	}
}