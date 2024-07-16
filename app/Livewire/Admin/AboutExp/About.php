<?php

namespace App\Livewire\Admin\AboutExp;

use App\Models\AdminAbout;
use Livewire\Component;
use Livewire\WithFileUploads; 
use Livewire\WithPagination;

class About extends Component
{
    use WithFileUploads; 
    use WithPagination; 
    protected $paginationTheme = 'bootstrap';

    public $about_experience, $about_image, $about_contact, $status;

    public function render()
    {
        $about = AdminAbout::orderBy('id','desc')->paginate(2); 
        return view('livewire.admin.aboutexp.about',['about'=>$about]);
    }

    public function store()
    {
        $this->validate([ 
            'about_experience' => 'required',
            'about_image' => 'required',
            'about_contact' => 'required',
        ]);

        $imageName = time().'.'.$this->about_image->extension();
        $imagePath = $this->about_image->storeAs('about', $imageName, 'public');

        $statusCheck = $this->status;  
        $status = 0;

        if($statusCheck == true){ 
            $status = 1;
        }

        $about = new AdminAbout(); 
        $about->about_experience = $this->about_experience; 
        $about->about_image = $imageName; 
        $about->about_contact = $this->about_contact; 
        $about->status = $status; 

        $about->save();  
        session()->flash('messege','AboutExperience Added Successfully'); 
        $this->dispatch('model-close'); 
        $this->resetField();
    }

    public function resetField()
    { 
        $this->about_experience = null;
        $this->about_image = null;
        $this->about_contact = null;
        $this->status = null;
    }
}

