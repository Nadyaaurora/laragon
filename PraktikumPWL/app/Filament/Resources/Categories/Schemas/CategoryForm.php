<?php

namespace App\Filament\Resources\Categories\Schemas;

use Filament\Forms;
use Filament\Schemas\Schema;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Repeater;

class CategoryForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->label('Category Name')
                    ->required(),

                Repeater::make('members') 
                    ->schema([
                        TextInput::make('name')
                            ->label('Name')
                            ->required(),
                        
                        Select::make('role')
                            ->label('Role')
                            ->options([
                                'owner' => 'Owner',
                                'administrator' => 'Administrator',
                                'member' => 'Member',
                            ])
                            ->required(),
                    ])
                    ->columns(2) 
                    ->addActionLabel('Add to members') 
                    ->collapsible(), 
            ]);
    }
}