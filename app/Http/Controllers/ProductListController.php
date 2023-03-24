<?php

namespace App\Http\Controllers;

use App\Models\Product_Management;
use App\Models\Product_Category;
use Illuminate\Http\Request;

class ProductListController extends Controller
{
    public function index()
    {
        $products = Product_Management::with('product__category')->get();
        $productIds = $products->pluck('product_id')->toArray();
        $productCategories = Product_Category::whereIn('id', $productIds)->get();
    
        return view('productlist', compact('products', 'productCategories'));
    }

    public function showproduct($id)
    {
        $productdata = Product_Management::find($id);
        $product_categories = Product_Category::all();
        return view('productlist', compact('productdata', 'product_categories'));
    }
   
    
  
}
