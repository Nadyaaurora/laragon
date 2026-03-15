<?php

namespace App\Filament\Resources\Categories\Tables;

use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Actions\EditAction;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\BulkActionGroup;

class CategoriesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->label('Title')
                    ->searchable()
                    ->sortable(),
                    
                // JURUS MANUAL TOTAL
                TextColumn::make('members_names')
                    ->label('Member Names')
                    ->badge()
                    ->getStateUsing(function ($record) {
                        $data = $record->members;
                        if (is_string($data)) $data = json_decode($data, true);
                        
                        return is_array($data) ? collect($data)->pluck('name')->implode(', ') : '-';
                    }),
                
                TextColumn::make('members_roles')
                    ->label('Roles')
                    ->badge()
                    ->color('warning')
                    ->getStateUsing(function ($record) {
                        $data = $record->members;
                        if (is_string($data)) $data = json_decode($data, true);
                        
                        return is_array($data) ? collect($data)->pluck('role')->implode(', ') : '-';
                    }),
            ])

            ->recordActions([
                EditAction::make(),
                DeleteAction::make(),
            ])

            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]); 
    }
}
