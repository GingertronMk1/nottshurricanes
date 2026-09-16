<?php

namespace App\Filament\Resources\CommitteeMembers\Schemas;

use App\Models\User;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Group;
use Filament\Schemas\Schema;

class CommitteeMemberForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->columns(4)
            ->components([
                TextInput::make('role')
                    ->columnSpan(2)
                    ->required(),
                TextInput::make('name')
                    ->columnSpan(2)
                    ->required(),
                Textarea::make('description')
                    ->columnSpanFull(),
                Toggle::make('is_active')
                    ->columnSpan(1),
                TextInput::make('sort_order')
                    ->columnSpan(1)
                    ->numeric(),
                Select::make('user_id')
                    ->options(User::query()->pluck('name', 'id'))
                    ->columnSpan(1)
                    ->label('User (optional)'),
                Group::make()
                    ->relationship('profilePicture')
                    ->columnSpan(2)
                    ->schema([
                        FileUpload::make('filename'),
                    ]),
            ]);
    }
}
