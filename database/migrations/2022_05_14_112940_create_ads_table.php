<?php

use App\Models\Category;
use App\Models\Currency;
use App\Models\District;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration{
    public function up()
    {
        Schema::create('ads', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('user_id')
                ->nullable()
                ->index();

            $table->foreignIdFor(Category::class)
                ->constrained()
                ->cascadeOnUpdate()
                ->cascadeOnDelete();

            $table->string('title')
                ->index();
            $table->fullText('title');

            $table->string('slug')
                ->unique();

            $table->unsignedMediumInteger('price')
                ->default(0)
                ->nullable()
                ->comment('0 Means Negotiable')
                ->index();

            $table->fullText('price');

            $table->foreignIdFor(Currency::class)
                ->nullable();

            $table->string('phone_number');

            $table->text('desc');

            $table->string('address');

            $table->foreignIdFor(District::class)
                ->nullable()
                ->index();

            $table->boolean('is_published')
                ->default(false);

            $table->boolean('is_chat_enabled')
                ->default(false);

            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('ads');
    }
};
