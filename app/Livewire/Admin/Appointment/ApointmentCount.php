<?php

namespace App\Livewire\Admin\Appointment;

use App\Models\Appointment;
use Livewire\Component;

class ApointmentCount extends Component
{  
    public $appointment; 
    protected $listeners = ['AppoinmentNotification-Updated' => 'AppointmentCountUpdate'];
    public function AppointmentCountUpdate()
    {
        $this->appointment = Appointment::where('appointment_view', 'unseen')->count();
    }
    public function render()
    { 
        $this->AppointmentCountUpdate();
        return view('livewire.admin.appointment.apointment-count',['appointment' => $this->appointment]);
    }
}
