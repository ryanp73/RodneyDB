<?php

namespace Rodney\Database\Seeders;

use Rodney\Models\User;

use Rodney\Utils\Auth;

$user = new User;
$user->first_name 	= 'You';
$user->last_name  	= 'Sir';
$user->password   	= Auth::hash('password');
$user->email 	  	= 'email@email.com';
$user->grade 	  	= 12;
$user->ethnicity  	= 'White';
$user->school	  	= 'BVN';
$user->frc 		  	= true;
$user->ftc 		  	= false;
$user->student_id 	= 12345678;
$user->phone_number = '1234567890';
$user->pref_contact = 'g';
$user->save();