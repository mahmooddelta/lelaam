<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
	
	public function up () {
		Schema::create('currencies', function (Blueprint $table) {
			$table->id();
			
			$table->string('name')
				->unique()
				->fulltext()
				->index();
			
			$table->string('symbol', 50);
			
			$table->boolean('is_active')
				->default(false);
			
			
			$table->timestamps();
		});
	}
	
	public function down () {
		Schema::dropIfExists('currencies');
	}
};