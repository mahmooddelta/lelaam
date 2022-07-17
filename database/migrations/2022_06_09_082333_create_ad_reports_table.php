<?php

use App\Models\Ad;
use App\Models\AdReport;
use App\Models\ReportType;
use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration{
    public function up()
    {
        Schema::create('ad_reports', function (Blueprint $table) {
            $table->id();

            $table->foreignIdFor(Ad::class)
                ->constrained()
                ->cascadeOnDelete()
                ->cascadeOnUpdate();

            $table->foreignIdFor(User::class)
                ->constrained()
                ->cascadeOnDelete()
                ->cascadeOnUpdate();

            $table->foreignIdFor(ReportType::class)
                ->constrained()
                ->cascadeOnDelete()
                ->cascadeOnUpdate();

            $table->text('description');

            $table->string('status', 60)
                ->default(array_search(AdReport::STATUS['pending'], AdReport::STATUS));

            $table->boolean('is_active')->default(true);

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('ad_reports');
    }
};
