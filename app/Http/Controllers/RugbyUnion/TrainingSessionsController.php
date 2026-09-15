<?php

namespace App\Http\Controllers\RugbyUnion;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Response;

class TrainingSessionsController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request): Response
    {
        return inertia('RugbyUnion/TrainingSessions');
    }
}
