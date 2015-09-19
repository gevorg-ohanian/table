<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableOthers extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::create('others',function($table){
			$table->increments('others_id');
			$table->string('others_email',30);
			$table->string('others_name',30);
			$table->string('others_surname',30);
			$table->string('others_country',30);
			$table->string('others_city',30);
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		//
		Schema::drop('others');
	}

}
