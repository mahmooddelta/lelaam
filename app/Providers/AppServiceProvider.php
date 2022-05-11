<?php

namespace App\Providers;

use Filament\Facades\Filament;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;

class AppServiceProvider extends ServiceProvider {
	
	/**
	 * Register any application services.
	 *
	 * @return void
	 */
	public function register () {
		//
	}
	
	/**
	 * Bootstrap any application services.
	 *
	 * @return void
	 */
	public function boot () {
		Filament::serving(function () {
			Filament::registerTheme(mix('css/app.css'));
		});
		
		Str::macro('persian_slug', function ($string, $separator = '-') {
			$string = trim($string);
			$string = mb_strtolower($string, 'UTF-8');
			$string = preg_replace("/[^a-z0-9_\-\sءاآؤئبپتثجچحخدذرزژسشصضطظعغفقكکگلمنوهی]/u", '', $string);
			$string = preg_replace("/[\s\-_]+/", ' ', $string);
			
			return preg_replace("/[\s_]/", $separator, $string);
		});
	}
}
