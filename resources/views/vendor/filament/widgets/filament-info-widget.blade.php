<x-filament::widget class="filament-filament-info-widget">
    <x-filament::card class="relative">
        <div class="relative h-12 flex flex-col justify-center items-center space-y-2">
            @php
                $timeOfDay = now()->hour
            @endphp
            <section>
                @if($timeOfDay >= 7 && $timeOfDay <= 19)
                    <div class="flex justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z"/>
                        </svg>
                        <b class="text-2xl text-primary-500 hover:text-black dark:hover:text-primary-400 font-bold">روز بخیر</b>
                    </div>
                @else
                    <div class="flex justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z"/>
                        </svg>
                        <b class="text-2xl text-primary-500 hover:text-black dark:hover:text-primary-400 font-bold">شب بخیر</b>
                    </div>
                @endif
            </section>
            <div class="space-y-1">
                <b
                    @class([
                        'flex rtl:space-x-reverse text-gray-800 hover:text-primary-500 transition',
                        'dark:text-primary-500 dark:hover:text-primary-400' => config('filament.dark_mode'),
                    ])
                >
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24"
                         stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                    </svg>
                    {{ now()->format('F d, Y') }}
                </b>
            </div>
        </div>
    </x-filament::card>
</x-filament::widget>
