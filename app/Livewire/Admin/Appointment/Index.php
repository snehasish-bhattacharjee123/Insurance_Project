<?php

namespace App\Livewire\Admin\Appointment;

use App\Models\Appointment;
use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        $appointment =  Appointment::orderBy('id','Desc')->paginate(5);
        return view('livewire.admin.appointment.index',['appointment'=>$appointment])->extends('layouts.admin');
    }
}
