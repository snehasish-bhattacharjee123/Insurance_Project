<?php

namespace App\Livewire\Admin\AboutExp;

use App\Models\AdminAbout;
use Illuminate\Support\Facades\File;
use Livewire\Component;
use Livewire\WithFileUploads; 
use Livewire\WithPagination;

class About extends Component
{
    use WithFileUploads; 
    use WithPagination; 
    protected $paginationTheme = 'bootstrap';

    public $about_experience, $about_image, $about_contact, $status, $aboutexp_id,$current_image;

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

        $imageNames = []; 
        foreach ($this->about_image as $image){ 
            $imageName = time().'.'.$image->getClientOriginalExtension();
            $imagePath = $image->storeAs('about',$imageName,'public');  
            $imageNames[] = $imageName; 
            
        }

        $statusCheck = $this->status;  
        $status = 0;

        if($statusCheck == true){ 
            $status = 1;
        }

        $about = AdminAbout::first(); 
        if(!$about)
        { 
            $about = new AdminAbout;
        } 

        $about->about_experience = $this->about_experience; 
        $about->about_image = json_encode($imageNames); 
        $about->about_contact = $this->about_contact; 
        $about->status = $status; 

        $about->save();  
        session()->flash('messege','Experience Added Successfully'); 
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
    
    public function delete($id)
    { 
        $this->aboutexp_id = $id; 
    } 
     public function destroy()
    { 
        $adminAbout = AdminAbout::find($this->aboutexp_id); 
        $path = 'storage/about/'.$adminAbout->about_image; 

        if(File::exists($path))
        { 
            File::delete($path);
        } 
        $adminAbout->delete(); 
        session()->flash('deleted','Experience Deleted Successfully'); 
        $this->dispatch('model-close');
    } 
    
    public function edit($id)
    {  
        $this->aboutexp_id = $id; 
        $adminAbout = AdminAbout::find($this->aboutexp_id);   

        $this->about_experience = $adminAbout->about_experience;
        $this->about_contact = $adminAbout->about_contact;
        $this->current_image = $adminAbout->about_image;
        $this->status = (bool)$adminAbout->status;
    } 
    public function update()
    { 
        $adminAbout = AdminAbout::find($this->aboutexp_id); 

        if($this->about_image){ 
            $path = 'storage/about/'.$adminAbout->about_image; 
            if(File::exists($path))
            { 
                File::delete($path);
            } 
            
            $imageName = time().'.'.$this->about_image->extension();
            $imagePath = $this->about_image->storeAs('about', $imageName, 'public'); 
            $adminAbout->about_image = $imageName; 
            
        }  
        




        $statusCheck = $this->status;  
        $status = 0;

        if($statusCheck == true){ 
            $status = 1;
        }

        $adminAbout->about_experience = $this->about_experience; 
        $adminAbout->about_contact = $this->about_contact; 
        $adminAbout->status = $status; 

        $adminAbout->save();  
        session()->flash('messege','Experience Updated Successfully'); 
        $this->dispatch('model-close'); 
        
    }

}

