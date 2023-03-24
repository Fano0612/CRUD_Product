<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductClone extends Model
{
    use HasFactory;
    protected $table = 'productclone';
    protected $primaryKey = 'product_id';

    protected $fillable = ['product_id','product_name','product_price', 'product_stock', 'product_picture'];

}
