<?php

namespace App\Filament\Resources\Categories\Schemas;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Schemas\Schema;
use Filament\Forms\Components\TextInput;

class CategoryForm
{
    /**
     * Mengatur konfigurasi form untuk Resource Category.
     */
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                // Input untuk nama (yang tampil sebagai Title di tabel)
                TextInput::make('name')
                    ->label('Title') // Samakan labelnya jadi Title agar tidak bingung
                    ->required()
                    ->maxLength(255),
            ]);
    }
}