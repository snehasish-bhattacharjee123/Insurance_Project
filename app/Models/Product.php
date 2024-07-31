<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Product extends Model
{
    use HasFactory;
    protected $table = 'products'; 
    protected $fillable = [ 
        'service_id', 
        'title', 
        'product_image', 
        'small_description', 
    ];
    public function service(){ 
        return $this->belongsTo(Service::class, 'service_id','id');
    }
}
