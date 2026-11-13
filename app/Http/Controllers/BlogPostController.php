<?php

namespace App\Http\Controllers;

use App\Models\BlogPost;
use Illuminate\View\View;

class BlogPostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return view('blog.index', [
            'posts' => BlogPost::query()->latest('created_at')->latest('id')->paginate(10),
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(BlogPost $blogPost): View
    {
        return view('blog.show', [
            'post' => $blogPost,
        ]);
    }
}
