<?php

namespace App\Filament\Widgets;

use App\Models\MenuItem;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Filament\Widgets\Widget;
use Filament\Notifications\Notification;

class MenuFormWidget extends Widget implements HasForms
{
    use InteractsWithForms;

    protected string $view = 'filament.widgets.menu-form-widget';

    protected int | string | array $columnSpan = 1;

    public ?array $data = [];

    public function mount(): void
    {
        $this->form->fill();
    }

    // Sekarang kodenya jadi bersih, nggak ada backslash (\) lagi
    public function form($form)
    {
        return $form
            ->schema([
                \Filament\Forms\Components\TextInput::make('title')->required(),
                \Filament\Forms\Components\TextInput::make('url')->required(),
                \Filament\Forms\Components\Select::make('target')
                    ->options(['_self' => 'Same Tab', '_blank' => 'New Tab'])
                    ->default('_self'),
            ])
            ->statePath('data');
    }

    public function submit(): void
    {
        $state = $this->form->getState();

        MenuItem::create($state);

        $this->form->fill();

        Notification::make()
            ->title('Menu Item Created!')
            ->success()
            ->send();

        $this->dispatch('refreshTree');
    }
}
