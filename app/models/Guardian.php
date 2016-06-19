<?php

namespace Rodney\Models;

use \Illuminate\Database\Eloquent\Model as Eloquent;

class Guardian extends Eloquent
{
	public function child()
	{
		return $this->belongsTo('Rodney\Models\User');
	}
}