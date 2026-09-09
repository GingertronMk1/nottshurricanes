<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Support\Facades\Route;

class PageContent extends Model
{
    /** @use HasFactory<\Database\Factories\PageContentFactory> */
    use HasFactory;

    protected $fillable = [
        'route',
        'title',
        'content',
    ];

    protected function routeUri(): Attribute
    {
        return Attribute::make(
            get: fn (mixed $value, array $attributes) => Route::getRoutes()->getByName($attributes['route'])->uri()
        );
    }
}
