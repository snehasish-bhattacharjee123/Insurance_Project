<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class PostAdminController extends Controller
{
    public function index()
    {
        // dd('hi');
        $post = Post::all();
        // dd($posts);
        return view('admin.post.index',['post' => $post]);
    }
}
