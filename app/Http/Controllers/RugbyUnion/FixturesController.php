<?php

namespace App\Http\Controllers\RugbyUnion;

use App\Http\Controllers\Controller;
use App\Models\Fixture;
use Illuminate\Http\Request;
use Inertia\Response;

class FixturesController extends Controller
{
    public function index(): Response
    {
        return inertia('RugbyUnion/Fixtures/Index', [
            'fixtures' => Fixture::query()->paginate(10),
        ]);
    }

    public function show(Fixture $fixture): Response
    {
        return inertia('RugbyUnion/Fixtures/Show', [
            'fixture' => $fixture,
        ]);
    }
}
