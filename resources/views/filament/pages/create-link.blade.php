<x-filament-panels::page>
    <x-filament-panels::form wire:submit.prevent="generate">
        {{ $this->form }}
        <div class="mt-4">
            <x-filament::button class="w-full" type="submit">
                Сгенерировать ссылку
            </x-filament::button>
        </div>
    </x-filament-panels::form>
</x-filament-panels::page>
