@if (filled($brand = config('filament.brand')))
    <div @class([
        'text-xl font-bold tracking-tight filament-brand',
        'dark:text-white' => config('filament.dark_mode'),
    ])>
        <div class="px-20">
            <img src="{{ secure_asset('images/logo.png') }}" alt="{{ config('app.name') }} logo"
                 style="height: 90px;">
        </div>
    </div>
@endif
