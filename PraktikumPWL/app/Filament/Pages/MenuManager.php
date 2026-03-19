<?php

namespace App\Filament\Pages;

use App\Models\MenuItem;
use SolutionForest\FilamentTree\Pages\TreePage as BasePage;
use BackedEnum;

class MenuManager extends BasePage
{
    protected static string $model = MenuItem::class;

    protected static BackedEnum|string|null $navigationIcon = 'heroicon-o-bars-3';
    protected static ?string $navigationLabel = 'Menu Manager';
    protected static ?string $title = 'Menu Manager';
    protected static ?int $navigationSort = 1;

    public function getTreeTitle(): string
    {
        return 'title';
    }
}