<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Response;
use Inertia\ResponseFactory;

class ExternalLinksController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request): Response|ResponseFactory
    {
        return inertia('ExternalLinks', [
            'links' => config('external_links.links'),
        ]);
    }
}
