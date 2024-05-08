<x-filament-panels::page>
<div class="flex flex-wrap">
        @foreach ($hosts as $host)
            <div class="p-2">
                <livewire:host-component :host="$host" />
            </div>
        @endforeach
    </div>
</x-filament-panels::page>
