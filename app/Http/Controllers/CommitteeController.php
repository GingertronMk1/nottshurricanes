<?php

namespace App\Http\Controllers;

use App\Models\CommitteeMember;
use Illuminate\Http\Request;
use Inertia\Response;
use Inertia\ResponseFactory;

class CommitteeController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request): Response|ResponseFactory
    {
        return inertia('Committee', [
            'committee_members' => CommitteeMember::query()->with('profilePicture')->active()->get(),
        ]);
    }
}
