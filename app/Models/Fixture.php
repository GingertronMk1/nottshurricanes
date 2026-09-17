<?php

namespace App\Models;

use Database\Factories\FixtureFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fixture extends Model
{
    /** @use HasFactory<FixtureFactory> */
    use HasFactory;
}
