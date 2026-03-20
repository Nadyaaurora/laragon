<x-filament-panels::page>
    <x-slot name="headerActions">
        <div class="flex gap-2">
            <x-filament::button color="warning" size="sm" style="background-color: #f59e0b; color: white;">Save changes</x-filament::button>
            <x-filament::button color="danger" size="sm">Clear</x-filament::button>
            <x-filament::button color="gray" size="sm" outlined style="background-color: white; color: black; border-color: #d1d5db;">Cancel</x-filament::button>
        </div>
    </x-slot>

    <style>
        .split-container { display: flex; gap: 2rem; align-items: flex-start; }
        .sidebar-form { flex: 1; min-width: 320px; max-width: 380px; } 
        .main-content { flex: 2; } 
        .location-box { width: fit-content; margin-bottom: 3rem !important; }
        .bintang-merah { color: #ff0000 !important; font-weight: bold !important; font-size: 1.1rem; }
        
        .info-box-center {
            display: flex; flex-direction: column; align-items: center; justify-content: center;
            text-align: center; padding: 1.5rem; background-color: rgba(255, 255, 255, 0.05);
            border-radius: 0.75rem; border: 1px dashed rgba(255, 255, 255, 0.1); margin-bottom: 1.5rem;
        }

        .menu-item-box {
            background-color: #1f2937 !important; /* Abu-abu gelap (Gray 800) */
            border: 1px solid #374151 !important; /* Border Gray 700 */
            display: flex !important;
            align-items: center !important;
            padding: 0.75rem 1rem !important;
            border-radius: 0.75rem !important;
            width: 100% !important;
        }
        .menu-item-right {
            margin-left: auto !important; 
            display: flex !important;
            align-items: center !important;
            gap: 1.5rem !important;
        }
    </style>

    <div class="space-y-6">
        {{-- LOCATION BOX --}}
        <div class="location-box bg-black p-4 rounded-xl border border-gray-700 shadow-sm">
            <div class="flex items-center gap-4">
                <span class="text-sm font-medium text-white">Location <span class="bintang-merah">*</span></span>
                <div class="w-48">
                    <x-filament::input.select wire:model="location" style="background-color: #111 !important; color: white !important; border-color: #444 !important;">
                        <option value="header">Header</option>
                        <option value="footer">Footer</option>
                    </x-filament::input.select>
                </div>
            </div>
        </div>

        <div class="split-container">
            {{-- SISI KIRI --}}
            <div class="sidebar-form space-y-4">
                <x-filament::section collapsible>
                    <x-slot name="heading">Custom Link</x-slot>
                    <form wire:submit.prevent="create" class="space-y-4">
                        {{ $this->form }}
                        <div class="flex justify-end pt-2">
                            <x-filament::button type="submit" color="success" icon="heroicon-m-plus-circle">Add Menu Item</x-filament::button>
                        </div>
                    </form>
                </x-filament::section>

                <x-filament::section collapsible collapsed>
                    <x-slot name="heading">Fixed Link</x-slot>
                    <div class="space-y-2">
                        @foreach([['title' => 'Home', 'url' => '/'], ['title' => 'About', 'url' => '/about']] as $link)
                            <div class="flex justify-between items-center p-2 hover:bg-white/5 rounded-lg">
                                <span class="text-sm dark:text-gray-300">{{ $link['title'] }}</span>
                                <x-filament::button size="xs" color="gray" outlined wire:click="addFromFixed('{{ $link['title'] }}', '{{ $link['url'] }}')">Add</x-filament::button>
                            </div>
                        @endforeach
                    </div>
                </x-filament::section>

                <x-filament::section collapsible collapsed>
                    <x-slot name="heading">Products</x-slot>
                    <div class="space-y-2">
                        @foreach([['title' => 'Analytics', 'url' => '/analytics'], ['title' => 'Security', 'url' => '/security']] as $prod)
                            <div class="flex justify-between items-center p-2 hover:bg-white/5 rounded-lg">
                                <span class="text-sm dark:text-gray-300">{{ $prod['title'] }}</span>
                                <x-filament::button size="xs" color="gray" outlined wire:click="addFromFixed('{{ $prod['title'] }}', '{{ $prod['url'] }}')">Add</x-filament::button>
                            </div>
                        @endforeach
                    </div>
                </x-filament::section>
            </div>

            {{-- SISI KANAN --}}
            <div class="main-content">
                <x-filament::section>
                    <div class="info-box-center">
                        <p class="text-sm dark:text-gray-300 max-w-lg leading-relaxed">
                            You can edit menu items using the navigation buttons on the right side.
                            <br> Click the edit button to see more features.
                        </p>
                    </div>

                    <div class="space-y-3">
                        @forelse(\App\Models\MenuItem::orderBy('order')->get() as $item)
                            <div class="menu-item-box transition-all {{ $item->parent_id ? 'ml-12' : '' }}">
                                
                                {{-- KIRI --}}
                                <div class="flex items-center gap-3">
                                    <x-filament::icon icon="heroicon-o-arrows-up-down" class="w-5 h-5 text-gray-400" />
                                    <span class="font-medium text-sm text-gray-100">
                                        {{ $item->title }}
                                    </span>
                                </div>
                                
                                {{-- KANAN (POJOK) --}}
                                <div class="menu-item-right">
                                    <span class="text-[10px] text-gray-400 uppercase font-semibold">
                                        custom link
                                    </span>
                                    
                                    <div class="flex gap-1 items-center">
                                        <x-filament::icon-button icon="heroicon-m-chevron-down" color="gray" size="sm" />
                                        <x-filament::icon-button icon="heroicon-m-pencil-square" color="gray" size="sm" outlined />
                                        <x-filament::icon-button icon="heroicon-m-trash" color="danger" size="sm" outlined />
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="p-12 text-center text-gray-500 italic border border-dashed rounded-xl border-gray-700">
                                No menu items yet. Add one on the left!
                            </div>
                        @endforelse
                    </div>
                </x-filament::section>
            </div>
        </div>
    </div>
</x-filament-panels::page>