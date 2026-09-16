<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ExternalLinksController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        return inertia('ExternalLinks', [
            'links' => config('external_links.links'),
        ]);
    }
}
