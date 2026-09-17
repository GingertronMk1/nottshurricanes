<?php

namespace App\Filament\Resources\Fixtures\Schemas;

use App\RugbyType;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class FixtureForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('type')
                    ->options(RugbyType::prettyCases())
                    ->required(),
                TextInput::make('opposition')
                    ->required(),
                TextInput::make('location')
                    ->required(),
                DateTimePicker::make('start')
                    ->required(),
            ]);
    }
}
