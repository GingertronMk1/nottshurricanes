<?php

namespace App\Models;

use Database\Factories\FileFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Support\Facades\Storage;

class File extends Model
{
    /** @use HasFactory<FileFactory> */
    use HasFactory;

    public function getFilePath(): string
    {
        return storage_path("app/public/{$this->filename}");
    }

    public function getFile(): ?string
    {
        return Storage::get($this->getFilePath());
    }

    public function exists(): bool
    {
        return Storage::exists($this->getFilePath());
    }

    /**
     * @return MorphTo<Model, $this>
     */
    public function fileable(): MorphTo
    {
        return $this->morphTo('fileable');
    }
}
