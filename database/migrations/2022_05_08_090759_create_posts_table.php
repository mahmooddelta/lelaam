<?php

use App\Models\Category;
use App\Models\Currency;
use App\Models\District;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
	
	public function up () {
		Schema::create('posts', function (Blueprint $table) {
			$table->id();
			
			$table->foreignIdFor(Category::class)
				->constrained()
				->cascadeOnUpdate()
				->cascadeOnDelete();
			
			$table->string('title')
				->fulltext()
				->index();
			
			$table->unsignedMediumInteger('price')
				->fulltext()
				->index();
			
			$table->foreignIdFor(Currency::class)
				->constrained()
				->cascadeOnUpdate()
				->cascadeOnDelete();
			
			$table->string('phone_number');
			
			$table->text('desc');
			
			$table->string('address');
			
			$table->foreignIdFor(District::class)
				->nullable()
				->index();
			
			$table->boolean('is_published')
				->default(false);
			
			$table->timestamps();
			$table->softDeletes();
		});
	}
	
	public function down () {
		Schema::dropIfExists('posts');
	}
};