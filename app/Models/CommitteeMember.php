<?php

namespace App\Models;

use App\Fileable;
use Database\Factories\CommitteeMemberFactory;
use Illuminate\Database\Eloquent\Attributes\Appends;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Scope;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Support\Facades\Storage;

#[Fillable([
    'name',
    'role',
    'pronouns',
    'sort_order',
    'is_active',
    'description',
    'user_id',
])]
#[Appends([
    'profile_picture_url',
])]
class CommitteeMember extends Model
{
    use Fileable;

    /** @use HasFactory<CommitteeMemberFactory> */
    use HasFactory;

    /**
     * @param  Builder<$this>  $query
     */
    #[Scope]
    protected function active(Builder $query): void
    {
        $query
            ->where('is_active', true)
            ->orderBy('sort_order', 'asc');
    }

    /**
     * @return MorphOne<File, $this>
     */
    public function profilePicture(): MorphOne
    {
        return $this
            ->files()
            ->where('type', 'profile_picture')
            ->one()
            ->latestOfMany()
            ->withAttributes(['type' => 'profile_picture']);
    }

    public function getProfilePictureURLAttribute(): string
    {
        $tomorrow = now()->addDay();
        if ($this->profilePicture) {
            return asset(Storage::temporaryUrl(
                $this->profilePicture->filename,
                $tomorrow,
            ));
        }

        return Storage::disk('local')
            ->url('club_logo.jpg');
    }

    /**
     * @return BelongsTo<User, $this>
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
