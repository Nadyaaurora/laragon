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
use Filament\Schemas\Components\Group;
use Filament\Support\Icons\Heroicon;
use App\Models\Category;

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
                //grouping fields into 2 columns
                Group::make([
                    TextInput::make('title')
                        ->rules('required | min:3 | max:10'),
                    TextInput::make('slug')
                        ->rules('required')
                        ->unique()
                        ->validationMessages([
                            "unique" => "Slug must be unique"
                        ]),
                    Select::make('category_id')
                        ->relationship("category", "name")
                        ->options(Category::all()->pluck("name", "id"))
                        ->required()
                        //->preload()
                        ->searchable(),
                    ColorPicker::make("color"),
                ])->columns(2),
                    MarkdownEditor::make("content"),
                ])->columnSpan(2),
                
                //Grouping fields into 2 columns
                Group::make([
        
                //section 2 - image
                Section::make('Image Upload') 
                ->schema([ 
                    FileUpload::make('image') 
                    ->required()
                    ->disk('public') 
                    ->directory('post'),
                ]),

                // section 3 - meta
                Section::make('Meta Information') 
                ->schema([ 
                    //TagsInput::make('tags')
                    Select::make("tags")
                        ->relationship("tags", "name"),
                    Checkbox::make("published"),
                    DateTimePicker::make("published_at")
                ]),
                    ])->columnSpan(1),

            ])->columns(3);
    }
}
