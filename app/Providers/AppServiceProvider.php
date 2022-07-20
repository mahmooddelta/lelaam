<?php

namespace App\Providers;

use Filament\Facades\Filament;
use Illuminate\Foundation\Vite;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;
use Spatie\Image\Manipulations;
use Spatie\MediaLibrary\Conversions\Conversion;
use Spatie\MediaLibraryPro\Models\TemporaryUpload;

class AppServiceProvider extends ServiceProvider
{

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     * @throws \Exception
     */
    public function boot()
    {
        Filament::registerTheme(
            app(Vite::class)('resources/js/app.js'),
        );

        Str::macro('persian_slug', function($string, $separator = '-') {
            $string = trim($string);
            $string = mb_strtolower($string, 'UTF-8');
            $string = preg_replace("/[^a-z0-9_\-\sءاآؤئبپتثجچحخدذرزژسشصضطظعغفقكکگلمنوهی]/u", '', $string);
            $string = preg_replace("/[\s\-_]+/", ' ', $string);

            return preg_replace("/[\s_]/", $separator, $string);
        });

        TemporaryUpload::previewManipulation(function(Conversion $conversion) {
            $conversion->fit(Manipulations::FIT_CROP, 300, 300);
        });
    }
}
