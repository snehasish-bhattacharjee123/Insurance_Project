<?php

namespace App\Livewire\Admin\Post;

use App\Models\Post;
use Livewire\Component;
use Livewire\WithFileUploads; 
use Livewire\WithPagination; 
use Illuminate\Support\Facades\File;

class IndexView extends Component
{     

    public $current_image, $post_id, $posts_image, $caption, $description , $status;

    use WithFileUploads; 
    use WithPagination; 
    protected $paginationTheme = 'bootstrap';

    public function render()
    { 
        $post = Post::orderBy('id','DESC')->paginate(5);
        return view('livewire.admin.post.index-view',['post'=>$post]);
    }

    public function store()
    { 
        $this->validate([ 
            'posts_image' => 'required',
            'caption' => 'required',
        ]);  

        
        $imageName = time() . '.' . $this->posts_image->extension();
        $imagePath = $this->posts_image->storeAs('post', $imageName, 'public');
        
        $statusCheck = $this->status;  
        $status = 0;

        if($statusCheck == true){ 
            $status = 1;
        }

        $post = new Post; 

        $post->posts_image = $imageName; 
        $post->caption = $this->caption; 
        $post->description = $this->description; 
        $post->status = $status; 

        $post->save();  
        session()->flash('messege','Post Added Successfully'); 
        $this->dispatch('model-close'); 
        $this->resetField();

    } 
    public function resetField()
    { 
        $this->posts_image = null;
        $this->caption = null;
        $this->description = null;
        $this->status = null;
    } 

    public function delete($id)
    {
        $this->post_id = $id;
    }
    public function destroy()
    {
        $post = Post::findorfail($this->post_id);
       
        $path = '/storage/post/'.$post->posts_image;
        if(File::exists($path))
        {
            File::delete($path);
        }
        $post->delete();
        session()->flash('deleted','Post deleted successfully');
        $this->dispatch('model-close');
        
    }

    public function edit($id)
    {  
        $this->post_id = $id; 
        $post = Post::find($this->post_id);   

        $this->caption = $post->caption;
        $this->current_image = $post->posts_image;
        $this->description = $post->description;
        $this->status = (bool)$post->status;
    } 

    public function update()
    {
        $post = Post::find($this->post_id);

        if($this->posts_image){ 
            $path = 'storage/post/'.$post->posts_image; 
            if(File::exists($path))
            { 
                File::delete($path);
            } 
            
            $imageName = time().'.'.$this->posts_image->extension();
            $imagePath = $this->posts_image->storeAs('post', $imageName, 'public'); 
            $post->posts_image = $imageName; 
            
        }  
        
        $statusCheck = $this->status;  
        $status = 0;

        if($statusCheck == true){ 
            $status = 1;
        }

        $post->caption = $this->caption; 
        $post->description = $this->description; 
        $post->status = $status; 

        $post->save();  
        session()->flash('messege','Slider Updated Successfully'); 
        $this->dispatch('model-close');  
    }


}
