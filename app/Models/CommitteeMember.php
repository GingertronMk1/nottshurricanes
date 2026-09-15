<?php

namespace App\Models;

use App\Fileable;
use Database\Factories\CommitteeMemberFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommitteeMember extends Model
{
    use Fileable;

    /** @use HasFactory<CommitteeMemberFactory> */
    use HasFactory;
}
