<?php

namespace App\Filament\Pages;

use App\Models\MenuItem;
use SolutionForest\FilamentTree\Pages\TreePage as BasePage;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Actions\Action;
use Filament\Notifications\Notification;
use BackedEnum;

class MenuManager extends BasePage implements HasForms
{
    use InteractsWithForms;

    protected static string $model = MenuItem::class;
    protected string $view = 'filament.pages.menu-manager';
    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-bars-3';
    protected static ?string $title = 'Menu Manager';

    // 1. Wadah data buat Livewire (Langsung isi array kosong)
    public ?array $data = [];

    // 2. Hubungkan Form ke variabel $data
    protected function getFormStatePath(): string
    {
        return 'data';
    }

    // --- BAGIAN MOUNT DIHAPUS BIAR GAK ERROR ---

    protected function getHeaderActions(): array
    {
        return [
            Action::make('saveChanges')
                ->label('Save changes')
                ->color('warning')
                ->extraAttributes(['style' => 'background-color: #d97706; color: white; border: none;'])
                ->action(fn() => Notification::make()->title('Changes saved!')->success()->send()),

            Action::make('clear')
                ->label('Clear')
                ->color('danger')
                ->requiresConfirmation()
                ->action(fn() => $this->dispatch('refreshTree')),

            Action::make('cancel')
                ->label('Cancel')
                ->color('gray')
                ->outlined()
                ->url(fn() => '/admin'),
        ];
    }

    public function create(): void
    {
        // Ambil data yang sudah divalidasi
        $state = $this->form->getState();

        MenuItem::create([
            'title' => $state['title'],
            'url' => $state['url'],
            'target' => $state['target'],
            'order' => MenuItem::max('order') + 1,
            'parent_id' => null,
        ]);

        $this->form->fill(); // Reset form setelah simpan
        $this->dispatch('refreshTree');

        Notification::make()
            ->title('Menu item added successfully!')
            ->success()
            ->send();
    }

    public function addFromFixed(string $title, string $url): void
    {
        \App\Models\MenuItem::create([
            'title' => $title,
            'url' => $url,
            'target' => '_self',
            'order' => \App\Models\MenuItem::max('order') + 1,
            'parent_id' => null, // GANTI INI! Jangan -1, pake null aja biar gak error.
        ]);

        $this->dispatch('refreshTree');
        \Filament\Notifications\Notification::make()->title('Added: ' . $title)->success()->send();
    }

    protected function getFormSchema(): array
    {
        return [
            \Filament\Forms\Components\TextInput::make('title')
                ->label('Title')
                ->placeholder('Enter title...')
                ->required(),
            \Filament\Forms\Components\TextInput::make('url')
                ->label('URL')
                ->placeholder('https://...')
                ->required(),
            \Filament\Forms\Components\Select::make('target')
                ->label('Target')
                ->options([
                    '_self' => 'Same Tab',
                    '_blank' => 'New Tab',
                ])
                ->default('_self')
                ->required(),
        ];
    }
}
