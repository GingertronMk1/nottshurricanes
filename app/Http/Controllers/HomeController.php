<?php

namespace App\Http\Controllers;

use App\Models\BlogPost;
use App\Models\Fixture;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function __invoke(): View
    {
        return view('welcome', [
            'nextFixture' => Fixture::query()->where('start', '>=', now())->orderBy('start')->first(),
            'latestPosts' => BlogPost::query()->latest('created_at')->latest('id')->limit(3)->get(),
        ]);
    }
}
