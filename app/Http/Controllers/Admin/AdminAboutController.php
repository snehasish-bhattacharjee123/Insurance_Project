<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminAboutController extends Controller
{
    public function about(){ 
        
        return view('admin.aboutexp.about');
    }
}
