<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaUsers extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('users', function(Blueprint $table)
		{
			$table->create();
			$table->increments('id');
			$table->string('name', 50);
			$table->string('username', 20)->unique();
			$table->string('email', 50)->unique();
			$table->string('phonenumber', 20)->unique()->nullable();
			$table->string('address', 100)->nullable();
			$table->integer('age')->nullable();
			$table->boolean('gender');
			$table->float('latitude', 10,6)->nullable();
			$table->float('longitude', 10,6)->nullable();
			$table->string('img_user')->nullable();
			$table->integer('bike_type')->unsigned();
			$table->integer('id_profile')->unsigned();
			$table->string('password', 100);
			$table->integer('level');
			$table->boolean('active');
			$table->boolean('confirmed')->default(1);
			$table->string('confirmation_code')->nullable();
			$table->rememberToken();
			$table->timestamps();
			$table->foreign('bike_type')->references('id')->on('bike_types');
			$table->foreign('id_profile')->references('id')->on('profiles');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('users');
	}

}
