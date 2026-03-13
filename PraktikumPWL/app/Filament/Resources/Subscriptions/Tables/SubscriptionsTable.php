<?php

namespace App\Filament\Resources\Subscriptions\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\CreateAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class SubscriptionsTable
{
    public static function configure(Table $table): Table
{
    return $table
        ->columns([
            TextColumn::make('user_id')
                ->rowIndex()
                ->label('No'),

            TextColumn::make('name')
                ->label('Name')
                ->searchable(),

            TextColumn::make('price')
                ->label('Price')
                ->sortable(),

            TextColumn::make('start_date')
                ->label('Start date')
                ->date(),

            TextColumn::make('end_date')
                ->label('End date')
                ->date(),
        ])
        ->headerActions([
        ]);
    }
}

