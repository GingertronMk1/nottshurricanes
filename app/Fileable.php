<?php

namespace App;

use App\Models\File;
use Illuminate\Database\Eloquent\Model;

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
