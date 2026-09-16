<?php

namespace App\Filament\Resources\BlogPosts\Schemas;

use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;
use Filament\Support\Enums\Operation;

class BlogPostForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title')
                    ->required(),
                TextInput::make('slug')
                    ->hiddenOn(Operation::Create)
                    ->readonly(),
                MarkdownEditor::make('content')
                    ->required()
                    ->columnSpanFull(),
            ]);
    }
}
