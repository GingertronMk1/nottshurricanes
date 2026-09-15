<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Models\File;

/**
 * @mixin Model
 */
trait Fileable
{
    public function files()
    {
        return $this->morphMany(File::class, 'fileable');
    }
}
