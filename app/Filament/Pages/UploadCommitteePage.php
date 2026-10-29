<?php

namespace App\Filament\Pages;

use BackedEnum;
use Filament\Pages\Page;
use Filament\Support\Icons\Heroicon;

class UploadCommitteePage extends Page
{
    protected string $view = 'filament.pages.upload-committee-page';

    protected static string|null|BackedEnum $navigationIcon = Heroicon::UserPlus;
}
