<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateWorkhoursTable extends Migration {

	public function up()
	{
		Schema::create('workhours', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->integer('restaurant_id')->unsigned();
			$table->integer('day_id')->unsigned();
			$table->time('start_time');
			$table->time('end_time');
		});
	}

	public function down()
	{
		Schema::drop('workhours');
	}
}