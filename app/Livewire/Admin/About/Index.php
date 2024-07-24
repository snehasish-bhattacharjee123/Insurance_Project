<?php

namespace App\Livewire\Admin\About;

use App\Models\About;
use Livewire\Component;

class Index extends Component
{
    public function render()
    { 
        $about = About::all();
        return view('livewire.admin.about.index',['about'=>$about]);
    }
}
