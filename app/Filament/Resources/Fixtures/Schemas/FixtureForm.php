<?php

namespace App\Filament\Resources\Fixtures\Schemas;

use App\RugbyType;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class FixtureForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->columns(3)
            ->components([
                Select::make('type')
                    ->options(RugbyType::prettyCases())
                    ->required(),
                TextInput::make('opposition')
                    ->required(),
                TextInput::make('location')
                    ->required(),
                MarkdownEditor::make('report')
                    ->columnSpanFull(),
                DateTimePicker::make('start')
                    ->required(),
                TextInput::make('hurricanes_score')
                    ->numeric(),
                TextInput::make('opposition_score')
                    ->numeric(),
            ]);
    }
}
