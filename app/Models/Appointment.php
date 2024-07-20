<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{   
    protected $table = 'appointments'; 
    protected $fillable = [
        'appointment_name', 
        'appointment_email', 
        'appointment_number', 
        'appointment_service',
        'appointment_message',
        'appointment_view'
    ];
    use HasFactory;
}
