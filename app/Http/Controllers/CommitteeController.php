<?php

namespace App\Http\Controllers;

use App\Models\CommitteeMember;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CommitteeController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request): View
    {
        return view('committee', [
            'committee_members' => CommitteeMember::query()->with('profilePicture')->active()->get(),
        ]);
    }
}
