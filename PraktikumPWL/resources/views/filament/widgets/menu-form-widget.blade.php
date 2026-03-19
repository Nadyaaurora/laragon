<x-filament-widgets::widget>
    <x-filament::section>
        <form wire:submit.prevent="create">
            {{ $this->form }}
            <x-filament::button type="submit" color="success" class="mt-4 w-full">
                Add Menu Item
            </x-filament::button>
        </form>
    </x-filament::section>
</x-filament-widgets::widget>