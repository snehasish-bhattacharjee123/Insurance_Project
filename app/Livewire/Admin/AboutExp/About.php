<?php

namespace App\Livewire\Admin\AboutExp;

use App\Models\AdminAbout;
use Illuminate\Support\Facades\File;
use Livewire\Component;
use Livewire\WithFileUploads; 
use Livewire\WithPagination; 
use Illuminate\Support\Facades\Storage;

class About extends Component
{
    use WithFileUploads; 
    use WithPagination; 
    protected $paginationTheme = 'bootstrap';

    public $about_experience, $about_image, $about_contact, $status, $aboutexp_id,$current_image, $images;

    public function render()
    {
        $about = AdminAbout::orderBy('id','desc')->paginate(2); 
        return view('livewire.admin.aboutexp.about',['about'=>$about]);
    } 


    public function store()
    {
        $this->validate([ 
            'about_experience' => 'required',
            'about_image' => 'required|max:2',
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
        $this->validate([ 
            'about_experience' => 'required',
            'about_image' => 'required|max:2',
            'about_contact' => 'required',
        ]);

        $adminAbout = AdminAbout::find($this->aboutexp_id);  
        $existingImages = json_decode($adminAbout->about_image, true);
        $existingImageCount = count($existingImages);
        
        if ($this->about_image) {
            // Check if we have more images than allowed
            if ($existingImageCount + count($this->about_image) > 2) {
                session()->flash('deleted', 'You cannot upload more than 2 images.'); 
                $this->dispatch('model-close');
                return;
            }
            
            // Process new images
            $imageNames = [];
            foreach ($this->about_image as $image) {
                $imageName = time() . '.' . $image->getClientOriginalExtension();
                $imagePath = $image->storeAs('about', $imageName, 'public');
                $imageNames[] = $imageName;
            }
    
            // Combine old images with new ones
            $imageNames = array_merge($existingImages, $imageNames);
        } else {
            // If no new images are provided, keep existing images
            $imageNames = $existingImages;
        }
    
        // Convert the image names array to JSON
        $adminAbout->about_image = json_encode($imageNames);
    
        // Update other fields
        $statusCheck = $this->status;  
        $status = $statusCheck ? 1 : 0;
    
        $adminAbout->about_experience = $this->about_experience; 
        $adminAbout->about_contact = $this->about_contact; 
        $adminAbout->status = $status; 
    
        // Save the record
        $adminAbout->save();  
    
        session()->flash('messege', 'Experience Updated Successfully'); 
        $this->dispatch('model-close');
        
    }  

    public function particularImageDelete($index, $img)
{
    $particularImg = AdminAbout::first(); 
    
    if ($particularImg) {
        $images = json_decode($particularImg->about_image, true);
        
        if (is_array($images)) {
            if (isset($images[$index]) && $images[$index] === $img) {
                Storage::disk('public')->delete('about/' . $img);

                unset($images[$index]);

                $images = array_values($images);

                $particularImg->about_image = json_encode($images);
                $particularImg->save();

                session()->flash('deleted', 'Image deleted successfully.'); 
                $this->dispatch('model-close'); 
            } else {
                session()->flash('deleted', 'Image could not be found in the array.'); 
                $this->dispatch('model-close'); 
            }
        } else {
            session()->flash('deleted', 'Invalid image array format.'); 
            $this->dispatch('model-close'); 
        }
    } else {
        session()->flash('deleted', 'Record could not be found.'); 
        $this->dispatch('model-close'); 
    }
}

}

