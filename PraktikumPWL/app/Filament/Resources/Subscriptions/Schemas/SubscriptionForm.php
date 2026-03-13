<?php

namespace App\Filament\Resources\Subscriptions\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;
use Filament\Schemas\Schema;

class SubscriptionForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
        ->components([
            TextInput::make('user_id')
                ->required()
                ->numeric(),

            TextInput::make('name')
                ->required(),

            // TextInput::make('price')
            //     ->required()
            //     ->numeric(),

            DatePicker::make('start_date')
                ->required(),

            DatePicker::make('end_date')
                ->required(),
        ]);
    }
}
