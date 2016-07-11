<?php

namespace Rodney\Database\Migrations;

use Illuminate\Database\Capsule\Manager as Capsule;
use Illuminate\Database\Schema\Blueprint;

class UserMigration
{
	public function up()
	{
		Capsule::schema()->create('users', function (Blueprint $table) {
			$table->increments('id');
			$table->string('first_name', 32);
			$table->string('last_name', 32);
			$table->string('password', 60);
			$table->string('email');
			$table->tinyInteger('grade');
			$table->string('school');
			$table->boolean('frc')->default(true);
			$table->boolean('ftc')->default(false);
			$table->integer('student_id');
			$table->string('phone_number', 10);
			$table->char('pref_contact', 1)->default('s');
			$table->string('ethnicity');
			$table->boolean('checked_in')->default(false);
			$table->decimal('hours', 7, 3)->default(0);
			$table->integer('rank')->default(5);
			$table->datetime('last_check_in');
			$table->timestamps();
		});
	}

	public function down()
	{
		Capsule::schema()->drop('users');
	}
}