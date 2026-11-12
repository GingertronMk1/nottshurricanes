<?php

namespace App\Http\Controllers;

use App\Models\Fixture;
use App\RugbyType;
use Illuminate\View\View;

class FixturesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(RugbyType $rugbyType): View
    {
        return view('fixtures.index', [
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
    public function show(RugbyType $rugbyType, Fixture $fixture): View
    {
        return view('fixtures.show', [
            'type' => $rugbyType,
            'fixture' => $fixture,
        ]);
    }
}
