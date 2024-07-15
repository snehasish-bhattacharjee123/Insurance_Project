<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    use HasFactory; 
    protected $table = 'sliders'; 
    protected $fillable = [
        'slider_title', 
        'slider_image', 
        'slider_description', 
        'status'
    ];
}
