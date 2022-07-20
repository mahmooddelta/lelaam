<?php

namespace App\Providers;

use App\Actions\Jetstream\DeleteUser;
use App\Models\State;
use Illuminate\Http\Request;
use Illuminate\Support\ServiceProvider;
use Inertia\Inertia;
use Laravel\Fortify\Fortify;
use Laravel\Jetstream\Jetstream;
use function array_merge;

class JetstreamServiceProvider extends ServiceProvider
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
     */
    public function boot()
    {
        $this->configurePermissions();

        Jetstream::deleteUsersUsing(DeleteUser::class);

        Fortify::registerView(function() {
            return Inertia::render('Auth/Register', [
                'states' => State::select(['id', 'name'])->get(),
            ]);
        });
        Jetstream::inertia()->whenRendering('Profile/Show', function(Request $request, array $data) {
            return array_merge($data, [
                'states' => State::select(['id', 'name'])->get(),
            ]);
        });
    }

    /**
     * Configure the permissions that are available within the application.
     *
     * @return void
     */
    protected function configurePermissions()
    {
        Jetstream::defaultApiTokenPermissions(['read']);

        Jetstream::permissions([
            'create',
            'read',
            'update',
            'delete',
        ]);
    }
}
