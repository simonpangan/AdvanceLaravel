<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Channel;
use App\Models\Post;
use Illuminate\Pipeline\Pipeline;

class PostController extends Controller
{
    public function create() 
    {
       // $channels = Channel::all();
        // $channels = Channel::orderBy('name')->get();

       // return view('post.create',compact('channels'));
       return view('post.create');
    }

    public function index()
    {
        // $posts = Post::all();
        // $posts = Post::query();
        // if(request()->has('active')){
        //     $posts->where('active',request('active'));
        // }
        // if(request()->has('sort')){
        //     $posts->orderBy('title',request('sort'));
        // }
        //        $posts = $posts ->get();
        // $posts = app(Pipeline::class)
        //     ->send(Post::query())
        //     ->through([
        //         \App\QueryFilters\Active::class,
        //         \App\QueryFilters\Sort::class,
        //     ])
        //     ->thenReturn()
        //     ->get();
        $posts = Post::allPosts();


        return view('post.index', compact('posts'));
    }
}
