<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Support\Facades\Storage;

class File extends Model
{
    /** @use HasFactory<\Database\Factories\FileFactory> */
    use HasFactory;

    public function getFilePath(): string
    {
        return storage_path("app/public/{$this->filename}");
    }

    public function getFile()
    {
        return Storage::get($this->getFilePath());
    }

    public function exists(): bool
    {
        return Storage::exists($this->getFilePath());
    }

    public function fileable(): MorphTo
    {
        return $this->morphTo('fileable');
    }
}
