<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
	
	public function up () {
		Schema::create('attribute_value_post', function (Blueprint $table) {
			$table->foreignIdFor(\App\Models\Post::class)
				->constrained()
				->cascadeOnUpdate()
				->cascadeOnDelete();
			
			$table->foreignIdFor(\App\Models\Attribute::class)
				->constrained()
				->cascadeOnUpdate()
				->cascadeOnDelete();
			
			$table->foreignIdFor(\App\Models\AttributeValue::class)
				->constrained()
				->cascadeOnUpdate()
				->cascadeOnDelete();
		});
	}
	
	public function down () {
		Schema::dropIfExists('attribute_value_post');
	}
};