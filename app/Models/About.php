<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    use HasFactory; 
    protected $table = 'abouts'; 
    protected $fillable = [
        'name', 
        'Designation_title', 
        'slider', 
        'image',  
        'image_social',
        'experience', 
        'number',
        'heading_about',
        'highlight_description',
        'description'
    ];
}
