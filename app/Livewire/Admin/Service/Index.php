<?php

namespace App\Livewire\Admin\Service;

use App\Models\Service;
use Livewire\Component;
use Illuminate\Support\Facades\File; 
use Livewire\WithPagination; 

class Index extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $service_id;

    public function render()
    { 
        $service = Service::orderBy('id','desc')->paginate(5);
        return view('livewire.admin.service.index',['service'=>$service]);
    }

    public function delete($id)
    {
        $this->service_id = $id;
    }
    public function destroy()
{
    
    $service = Service::findOrFail($this->service_id);

    
    $sliderPath = public_path('assets/adminpanel/service/' . $service->slider_image);
    if (File::exists($sliderPath)) {
        File::delete($sliderPath);
    }

   

    
    $service->delete();

    
    session()->flash('deleted', 'The data has been deleted successfully.');
    return redirect()->route('service.index');
}
}
