<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
	
	public function up () {
		Schema::create('countries', function (Blueprint $table) {
			$table->id();
			
			$table->string('iso3', 3);
			
			$table->string('name')
				->unique()
				->fulltext()
				->index();
			
			$table->boolean('status')
				->default(true);
			
			
			$table->timestamps();
		});
	}
	
	public function down () {
		Schema::dropIfExists('countries');
	}
};