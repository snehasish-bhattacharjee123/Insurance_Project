<?php

namespace App\Livewire\Admin\Appointment;

use App\Models\Appointment;
use Livewire\Component; 
use Livewire\WithPagination;

class Index extends Component
{ 
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
}
