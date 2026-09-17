<?php

namespace App\Http\Controllers\TouchRugby;

use App\Http\Controllers\Controller;
use App\Models\Fixture;
use App\RugbyType;
use Inertia\Response;

class FixturesController extends Controller
{
    public function index(): Response
    {
        return inertia('TouchRugby/Fixtures/Index', [
            'fixtures' => Fixture::query()
                ->where('type', RugbyType::TOUCH)
                ->paginate(10),
        ]);
    }

    public function show(Fixture $fixture): Response
    {
        return inertia('TouchRugby/Fixtures/Show', [
            'fixture' => $fixture,
        ]);
    }
}
