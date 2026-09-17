<?php

namespace App\Http\Controllers;

use App\Models\BlogPost;
use Inertia\Response;
use Inertia\ResponseFactory;

class BlogPostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): Response|ResponseFactory
    {
        return inertia('BlogPost/Index', [
            'posts' => BlogPost::query()->paginate(10),
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(BlogPost $blogPost): Response|ResponseFactory
    {
        return inertia('BlogPost/Show', [
            'post' => $blogPost,
        ]);
    }
}
