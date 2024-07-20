<?php

namespace App\Livewire\Admin\Appointment;

use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        return view('livewire.admin.appointment.index')->extends('layouts.admin');
    }
}
