<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{   
    protected $table = 'appointments'; 
    protected $fillable = [
        'contact_name', 
        'contact_email', 
        'contact_number', 
        'contact_service',
        'contact_message',
        'contact_view'
    ];
    use HasFactory;
}
