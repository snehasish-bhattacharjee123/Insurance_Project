<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(){  
        $post = Post::where('status','=',1)->orderBy('id','desc')->get();  
        $user = User::first();
        return view('frontend.post',compact('post','user'));
    }
}
