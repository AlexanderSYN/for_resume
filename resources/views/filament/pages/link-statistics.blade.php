<x-filament-panels::page>
    <s-slot class="heading">
        {{ request()->getSchemeAndHttpHost() }}/{{ $this->link->short_code }} -> {{ $this->link->original_link }}
    </s-slot>

    {{ $this->table }}
</x-filament-panels::page>
