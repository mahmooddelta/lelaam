@if (filled($brand = config('filament.brand')))
    <div @class([
        'text-xl font-bold tracking-tight filament-brand flex items-center justify-center content-center',
        'dark:text-white' => config('filament.dark_mode'),
    ])>
        <div>
            <img src="{{ secure_asset('images/logo.png') }}" alt="{{ config('app.name') }} logo"
                 style="height: 90px; margin-right: 100%;">
        </div>
    </div>
@endif
