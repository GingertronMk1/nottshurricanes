<?php

namespace App\Models;

use App\Fileable;
use Database\Factories\PageContentFactory;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Route;

class PageContent extends Model
{
    use Fileable;

    /** @use HasFactory<PageContentFactory> */
    use HasFactory;

    protected $appends = [
        'route_uri',
    ];

    /**
     * @return Attribute<string|null, never>
     */
    protected function routeUri(): Attribute
    {
        return Attribute::make(
            get: fn (mixed $value, array $attributes): ?string => is_string($attributes['route'] ?? null)
                ? Route::getRoutes()->getByName($attributes['route'])?->uri()
                : null,
        );
    }
}
