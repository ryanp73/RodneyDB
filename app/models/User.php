<?php

namespace Rodney\Models;

use \Illuminate\Database\Eloquent\Model as Eloquent;

class User extends Eloquent
{
	public function guardians()
	{
		return $this->hasMany('Rodney\Models\Guardian');
	}
}