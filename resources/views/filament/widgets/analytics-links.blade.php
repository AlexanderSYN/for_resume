<x-filament-widgets::widget>
    <x-filament::section>
        <x-slot name="heading">
            Переходы по вашей ссылке
        </x-slot>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div class="p-4 bg-gray-100 dark:bg-gray-800 rounded-xl">
                <h3 class="text-lg font-bold text-primary-600">Всего перешло</h3>
                <p class="text-3xl font-black mt-2">{{ number_format($totalRedirected, 2) }}</p>
            </div>


        </div>
    </x-filament::section>
</x-filament-widgets::widget>
