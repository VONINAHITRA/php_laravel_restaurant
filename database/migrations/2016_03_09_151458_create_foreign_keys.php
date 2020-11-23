<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Eloquent\Model;

class CreateForeignKeys extends Migration {

	public function up()
	{
		Schema::table('workhours', function(Blueprint $table) {
			$table->foreign('restaurant_id')->references('id')->on('restaurants')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('workhours', function(Blueprint $table) {
			$table->foreign('day_id')->references('id')->on('days')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
	}

	public function down()
	{
		Schema::table('workhours', function(Blueprint $table) {
			$table->dropForeign('workhours_restaurant_id_foreign');
		});
		Schema::table('workhours', function(Blueprint $table) {
			$table->dropForeign('workhours_day_id_foreign');
		});
	}
}