<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product_Category extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $guarded = [];

    
    public function product__management(){
        return $this->hasMany(Product_Management::class,'category_id');
}
}
