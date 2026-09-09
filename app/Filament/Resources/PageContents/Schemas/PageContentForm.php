<?php

namespace App\Filament\Resources\PageContents\Schemas;

use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;
use Illuminate\Support\Facades\Route;

class PageContentForm
{
    public static function configure(Schema $schema): Schema
    {
        $routes = [];
        foreach (Route::getRoutes()->getRoutes() as $route) {
            $routes[$route->getName()] = $route->uri;
        }

        return $schema
            ->components([
                Select::make('route')
                    ->options($routes)
                    ->required(),
                TextInput::make('title')
                    ->required(),
                MarkdownEditor::make('content')
                    ->columnSpanFull(),
            ]);
    }
}
