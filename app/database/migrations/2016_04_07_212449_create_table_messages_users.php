<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableMessagesUsers extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('messages_users', function(Blueprint $table)
		{
			$table->create();
      $table->integer('user_id')->unsigned();
      $table->integer('message_id')->unsigned();
      $table->boolean('estate');
      $table->timestamps();
      $table->foreign('user_id')->references('id')->on('users');
      $table->foreign('message_id')->references('id')->on('messages');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('messages_users');
	}

}
