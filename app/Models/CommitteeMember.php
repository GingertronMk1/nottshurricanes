<?php

namespace App\Models;

use App\Fileable;
use Database\Factories\CommitteeMemberFactory;
use Illuminate\Database\Eloquent\Attributes\Scope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class CommitteeMember extends Model
{
    use Fileable;

    /** @use HasFactory<CommitteeMemberFactory> */
    use HasFactory;

    protected $fillable = [
        'name',
        'role',
        'pronouns',
        'sort_order',
        'is_active',
    ];

    #[Scope]
    protected function active(Builder $query): void
    {
        $query
            ->where('is_active', true)
            ->orderBy('sort_order', 'asc');
    }
}
