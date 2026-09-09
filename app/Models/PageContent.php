<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PageContent extends Model
{
    /** @use HasFactory<\Database\Factories\PageContentFactory> */
    use HasFactory;

    protected $fillable = [
        'route',
        'title',
        'content',
    ];
}
