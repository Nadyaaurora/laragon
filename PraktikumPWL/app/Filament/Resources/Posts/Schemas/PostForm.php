<?php

namespace App\Filament\Resources\Posts\Schemas;

use Dom\Text;
use Filament\Schemas\Schema;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\ColorPicker;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TagsInput;
use Filament\Forms\Components\Checkbox;
use Filament\Forms\Components\DateTimePicker;
use Filament\Schemas\Components\Section;
use Filament\Support\Icons\Heroicon;

class PostForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                //
                Section::make("Post Details")
                ->Description("Fill in the details of the post")
                // -> icon(Heroicon::RocketLaunch)
                -> icon('heroicon-o-document-text')
                ->schema([
                    TextInput::make('title'),
                    TextInput::make('slug'),
                    Select::make('category_id')
                        ->relationship("category", "name")
                        ->preload()
                        ->searchable(),
                    ColorPicker::make("color"),
                    MarkdownEditor::make("content"),
                ]),
                //section 2 - image
                Section::make('Image Upload') 
                ->schema([ 
                    FileUpload::make('image') 
                    ->disk('public') 
                    ->directory('post'),
                ]),
                // section 3 - meta
                Section::make('Meta Information') 
                ->schema([ 
                    TagsInput::make('tags'), 
                    Checkbox::make('published'), 
                    DateTimePicker::make('published_at'), 
                ]),
            ])->columns(2);
    }
}


