<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
    protected $table = 'product_images';    
    protected $guarded = [];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

}
