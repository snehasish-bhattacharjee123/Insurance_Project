<?php

namespace App\Livewire\Admin\Post;

use App\Models\Post;
use Livewire\Component;
use Livewire\WithFileUploads; 
use Livewire\WithPagination; 
use Illuminate\Support\Facades\File;

class IndexView extends Component
{     

    public $posts_image, $caption, $description , $status;

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
}
