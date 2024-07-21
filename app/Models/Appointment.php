<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{   
    use HasFactory;

    protected $table = 'appointments'; 
    protected $fillable = [
        'appointment_name', 
        'appointment_date', 
        'appointment_number', 
        'appointment_service',
        'appointment_message',
        'appointment_view'
    ];


    public function setAppointmentDateAttribute($value)
    {
        $this->attributes['appointment_date'] = Carbon::parse($value)->format('Y-m-d');
    }

    public function getAppointmentDateAttribute($value)
    {
        return Carbon::parse($value)->format('Y-m-d');
    }
    
}
