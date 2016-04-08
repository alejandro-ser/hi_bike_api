<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableEngagementsUsers extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('engagements_users', function(Blueprint $table)
		{
			$table->create();
      $table->integer('user_id')->unsigned();
      $table->integer('engagement_id')->unsigned();
      $table->boolean('estate');
      $table->timestamps();
      $table->foreign('user_id')->references('id')->on('users');
      $table->foreign('engagement_id')->references('id')->on('engagements');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('engagements_users');
	}

}
