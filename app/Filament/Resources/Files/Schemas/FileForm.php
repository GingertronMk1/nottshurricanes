<?php

namespace App\Filament\Resources\Files\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class FileForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                FileUpload::make('filename')
                    ->required(),
                TextInput::make('fileable_type')
                    ->required(),
                TextInput::make('fileable_id')
                    ->required()
                    ->numeric(),
                TextInput::make('type')
                    ->required(),
            ]);
    }
}
