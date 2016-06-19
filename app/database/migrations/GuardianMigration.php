<?php

namespace Rodney\Database\Migrations;

use Illuminate\Database\Capsule\Manager as Capsule;
use Illuminate\Database\Schema\Blueprint;

class GuardianMigration
{
	public function up()
	{
		Capsule::schema()->create('guardians', function (Blueprint $table) {
			$table->increments('id');
			$table->string('first_name', 32);
			$table->string('last_name', 32);
			$table->string('password', 60);
			$table->string('email');
			$table->string('phone_number', 10);
			$table->integer('user_id');
			$table->timestamps();
		});
	}

	public function down()
	{
		Capsule::schema()->drop('guardians');
	}
}