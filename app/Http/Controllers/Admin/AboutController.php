<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index(){ 

        return view('admin.about.index');
    } 
    public function create(){ 
        return view('admin.about.about-form');
    }
}
