<?php

namespace App\Filament\Resources\PageContents\RelationManagers;

use App\Filament\Resources\PageContents\PageContentResource;
use Filament\Actions\CreateAction;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables\Table;

class FilesRelationManager extends RelationManager
{
    protected static string $relationship = 'files';

    protected static ?string $relatedResource = PageContentResource::class;

    public function table(Table $table): Table
    {
        return $table
            ->headerActions([
                CreateAction::make(),
            ]);
    }
}
