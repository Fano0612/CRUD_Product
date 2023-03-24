<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product_Management extends Model
{
    use HasFactory;
    protected $primaryKey = 'product_id'; 
    protected $guarded = [];

    public function product__category(){
        return $this->belongsTo(Product_Category::class, 'category_id');
    }
}
