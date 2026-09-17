<?php

namespace App\Models;

use App\RugbyType;
use Database\Factories\FixtureFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fixture extends Model
{
    /** @use HasFactory<FixtureFactory> */
    use HasFactory;

    protected $casts = [
        'type' => RugbyType::class,
    ];
}
