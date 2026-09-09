<?php

namespace App\Http\Controllers\TouchRugby;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TrainingSessionsController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        return inertia('TouchRugby/TrainingSessions');
    }
}
