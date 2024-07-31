<?php

namespace App\Livewire\Admin\Product;

use App\Models\Product;
use App\Models\Service;
use Livewire\Component;
use Illuminate\Support\Facades\File; 
use Livewire\WithPagination; 

class Index extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $product_id;

    public function render()
    { 
        $product = Product::orderBy('id','desc')->paginate(5); 
        return view('livewire.admin.product.index',['product'=>$product]);
        
    }

    public function delete($id)
    {
        $this->product_id = $id;
    }
    public function destroy()
{
    
    $product = Product::findOrFail($this->product_id);

    
    $sliderPath = public_path('assets/adminpanel/product/' . $product->product_image);
    if (File::exists($sliderPath)) {
        File::delete($sliderPath);
    }

    $product->delete();

    
    session()->flash('deleted', 'The data has been deleted successfully.');
    $this->dispatch('model-close');
}

}
