<?php

namespace App\Livewire\Admin\About;

use App\Models\About;
use Livewire\Component;
use Illuminate\Support\Facades\File;

class Index extends Component
{

    protected $paginationTheme = 'bootstrap';

    public $about_id;

    public function render()
    { 
        $about = About::all();
        return view('livewire.admin.about.index',['about'=>$about]);
    }

    public function delete($id)
    {
        $this->about_id = $id;
    }
    public function destroy()
{
    // Find the record by its ID
    $about = About::findOrFail($this->about_id);

    // Delete the slider image if it exists
    $sliderPath = public_path('assets/adminpanel/about/slider/' . $about->slider);
    if (File::exists($sliderPath)) {
        File::delete($sliderPath);
    }

   
    $profileImagePath = public_path('assets/adminpanel/about/profile/' . $about->image);
    if (File::exists($profileImagePath)) {
        File::delete($profileImagePath);
    }

   
    $socialImagePath = public_path('assets/adminpanel/about/social/' . $about->image_social);
    if (File::exists($socialImagePath)) {
        File::delete($socialImagePath);
    }

    
    $about->delete();

    
    session()->flash('deleted', 'The data has been deleted successfully.');

   
    return redirect()->route('about.index');
}
}
