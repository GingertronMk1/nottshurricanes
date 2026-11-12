<?php

namespace App\Http\Controllers;

use App\Models\Fixture;
use App\RugbyType;
use Illuminate\Http\Request;
use Illuminate\View\View;

class FixturesController extends Controller
{
    public function index(Request $request): View
    {
        $type = $request->query('type');
        $rugbyType = is_string($type) ? RugbyType::tryFrom($type) : null;
        abort_if($type !== null && $rugbyType === null, 404);

        $fixtures = Fixture::query();

        if ($rugbyType !== null) {
            $fixtures->where('type', $rugbyType->value);
        }

        return view('fixtures.index', [
            'type' => $rugbyType,
            'fixtures' => $fixtures
                ->orderByDesc('fixtures.start')
                ->paginate(10)
                ->withQueryString(),
        ]);
    }

    public function show(Fixture $fixture): View
    {
        return view('fixtures.show', ['fixture' => $fixture]);
    }
}
