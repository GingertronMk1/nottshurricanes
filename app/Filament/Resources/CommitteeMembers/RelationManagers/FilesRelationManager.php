<?php

namespace App\Filament\Resources\CommitteeMembers\RelationManagers;

use App\Filament\Resources\Files\FileResource;
use Filament\Actions\CreateAction;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Schemas\Schema;
use Filament\Tables\Table;

class FilesRelationManager extends RelationManager
{
    protected static string $relationship = 'files';

    protected static ?string $relatedResource = FileResource::class;

    public function form(Schema $schema): Schema
    {
        return $schema->schema([
            FileUpload::make('filename')->required(),
            TextInput::make('type')->required(),
        ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->headerActions([
                CreateAction::make(),
            ]);
    }
}
