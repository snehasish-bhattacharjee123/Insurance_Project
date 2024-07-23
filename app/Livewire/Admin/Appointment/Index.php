<?php

namespace App\Livewire\Admin\Appointment;

use App\Models\Appointment;
use Livewire\Component; 
use Livewire\WithPagination;

class Index extends Component
{ 

    public $appointment_id;

    use WithPagination; 
    protected $paginationTheme = 'bootstrap';
    public function render()
    {
        $appointment =  Appointment::orderBy('id','Desc')->paginate(5);
        return view('livewire.admin.appointment.index',['appointment'=>$appointment])->extends('layouts.admin');
    } 
    public function appointment_view($id)
    { 
        $appointment =  Appointment::find($id); 
        $appointment->appointment_view = 'seen';

        $appointment->save();  
        session()->flash('messege','Appointment Seen'); 
        $this->dispatch('AppoinmentNotification-Updated');

    }

    public function delete($id)
    {
        $this->appointment_id =  $id;
        
    }

    public function destroy()
    {
        $appointment = Appointment::find($this->appointment_id);

        if($appointment)
        {
            $appointment->delete();
        }
        session()->flash('deleted','Appointment Deleted Successfully'); 
        $this->dispatch('AppoinmentNotification-Updated');
        $this->dispatch('model-close');

    }
}
