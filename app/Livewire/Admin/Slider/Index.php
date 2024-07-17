<?php

namespace App\Livewire\Admin\Slider;

use App\Models\Slider;
use Livewire\Component;
use Livewire\WithFileUploads; 
use Livewire\WithPagination; 
use Illuminate\Support\Facades\File;

class Index extends Component
{  
    use WithFileUploads; 
    use WithPagination; 
    protected $paginationTheme = 'bootstrap';

    public $slider_title, $slider_image, $slider_description , $status, $slider_id;

    public function render()
    { 
        $slider = Slider::orderBy('id','desc')->paginate(2);  
        return view('livewire.admin.slider.index',['slider'=>$slider]);
    } 

    public function store()
    { 
        $this->validate([ 
            'slider_title' => 'required',
            'slider_image' => 'required',
            'slider_description' => 'required',
        ]);  

        
        $imageName = time() . '.' . $this->slider_image->extension();
        $imagePath = $this->slider_image->storeAs('slider', $imageName, 'public');
        

        

        $statusCheck = $this->status;  
        $status = 0;

        if($statusCheck == true){ 
            $status = 1;
        }

        $slider = new Slider; 
        $slider->slider_title = $this->slider_title; 
        $slider->slider_image = $imageName; 
        $slider->slider_description = $this->slider_description; 
        $slider->status = $status; 

        $slider->save();  
        session()->flash('messege','Slider Added Successfully'); 
        $this->dispatch('model-close'); 

    } 
    public function resetField()
    { 
        $this->slider_title = null;
        $this->slider_image = null;
        $this->slider_description = null;
        $this->status = null;
    } 

    public function delete($id)
    {
        $this->slider_id = $id;
    }
    public function destroy()
    {
        $slider = Slider::findorfail($this->slider_id);
        $path = '/storage/slider/'.$slider->slider_image;
        if(File::exists($path))
        {
            File::delete($path);
        }
        $slider->delete();
        session()->flash('success','Slider deleted deleted successfully');
        $this->dispatch('model-close');
    }

    public function edit($id)
    {  
        $this->slider_id = $id; 
        $slider = Slider::find($this->slider_id);   

        $this->slider_title = $slider->slider_title;
        $this->slider_description = $slider->slider_description;
        $this->status = (bool)$slider->status;
    } 

    public function update()
    {
        $slider = Slider::find($this->slider_id);

        if($this->slider_image){ 
            $path = 'storage/slider/'.$slider->slider_image; 
            if(File::exists($path))
            { 
                File::delete($path);
            } 
            
            $imageName = time().'.'.$this->slider_image->extension();
            $imagePath = $this->slider_image->storeAs('slider', $imageName, 'public'); 
            $slider->slider_image = $imageName; 
            
        }  
        




        $statusCheck = $this->status;  
        $status = 0;

        if($statusCheck == true){ 
            $status = 1;
        }

        $slider->slider_title = $this->slider_title; 
        $slider->slider_description = $this->slider_description; 
        $slider->status = $status; 

        $slider->save();  
        session()->flash('messege','Experience Updated Successfully'); 
        $this->dispatch('model-close'); 
    }
    
}




















