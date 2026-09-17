<?php

namespace App\Models;

use Database\Factories\BlogPostFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class BlogPost extends Model
{
    /** @use HasFactory<BlogPostFactory> */
    use HasFactory;

    protected static function booted(): void
    {
        static::creating(function (self $post) {
            $post->slug = static::createUniqueSlug($post->title);
        });
    }

    public static function createUniqueSlug(string $title): string
    {
        $original = Str::slug($title);
        $slug = $original;
        $count = 1;
        while (self::query()->where('slug', $slug)->exists()) {
            $slug = $original.'-'.$count;
            $count++;
        }

        return $slug;
    }
}
