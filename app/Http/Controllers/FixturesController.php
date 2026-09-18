<?php

namespace App\Http\Controllers;

use App\Models\Fixture;
use App\RugbyType;
use Inertia\Response;

class FixturesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(RugbyType $rugbyType): Response
    {
        return inertia('Fixtures/Index', [
            'type' => $rugbyType,
            'fixtures' => Fixture::query()
                ->where('type', $rugbyType->value)
                ->orderByDesc('fixtures.start')
                ->paginate(10),
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(RugbyType $rugbyType, Fixture $fixture): Response
    {
        return inertia('Fixtures/Show', [
            'type' => $rugbyType,
            'fixture' => $fixture,
        ]);
    }
}
