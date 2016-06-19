<?php

namespace Rodney\Database\Seeders;

use Rodney\Models\Guardian;

use Rodney\Utils\Auth;

$guardian = new Guardian;
$guardian->first_name   = 'Test';
$guardian->last_name    = 'User';
$guardian->password     = Auth::hash('password');
$guardian->email 		= 'test@email.com';
$guardian->phone_number = '9876543210';
$guardian->user_id	    = 1;
$guardian->save();