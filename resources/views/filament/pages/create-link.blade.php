<x-filament-panels::page>
    <form wire:submit.prevent="save" class="space-y-6">
        {{ $this->form }}

        <div class="flex flex-wrap items-center gap-4 justify-start">
            <x-filament-panels::form.actions
                :action="$this->getFormActions()"
                />
        </div>
    </form>
</x-filament-panels::page>
