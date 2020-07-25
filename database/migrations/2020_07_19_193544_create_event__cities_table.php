<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventCitiesTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('event__cities', function (Blueprint $table) {
				$table->bigIncrements('id');
				$table->string('name')->nullable();
				$table->longText('description')->nullable();
				$table->string('image')->nullable();
				$table->string('for')->nullable();
				$table->timestamps();
			});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::dropIfExists('event__cities');
	}
}
