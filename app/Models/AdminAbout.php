<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminAbout extends Model
{   
    use HasFactory;
    protected $table = 'adabout'; 
    protected $fillable = [
        'about_experience', 
        'about_image', 
        'about_contact', 
        'status'
    ];
}
