<?php

use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('blog_posts', function(Blueprint $table) {
            $table->id();

            $table->foreignIdFor(User::class)->nullable()->cascadeOnDelete();
            $table->foreignId('blog_category_id')->nullable()->nullOnDelete();

            $table->string('title');
            $table->string('slug')->unique();

            $table->longText('content');

            $table->dateTime('published_at')->nullable();

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('blog_posts');
    }
};
