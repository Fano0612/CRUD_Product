<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product_Management;
use App\Models\ProductClone;
use Illuminate\Support\Facades\Auth;

class ProductCloneController extends Controller
{
    public function index()
    {
        $clone = ProductClone::all();
        return view('cart', compact('clone'));
    }
    

    public function clone(Request $request)
    {
        $product_id = $request->input('product_id');
        $product = Product_Management::find($product_id);
        
        // Check if the product exists in ProductClone table
        $clone = ProductClone::where('product_id', $product_id)->first();
        
        if ($clone) {
            // If the product already exists in ProductClone table, update its product stock
            $clone->product_stock += 1;
            $clone->save();
        } else {
            // If the product doesn't exist in ProductClone table, create a new entry
            $clone = new ProductClone();
            $clone->fill($product->attributesToArray());
            $clone->product_stock = 1;
            $clone->save();
        }
        
        // Update the product stock in Product_Management table
        $product->product_stock -= 1;
        $product->save();
        
        return redirect()->back()->with('success', 'Product cloned successfully!');
    }
    
    
    
    

    public function showdata($id)
    {
        $clone = ProductClone::find($id);
        return view('cart', compact('clone'));
    }
    public function deletion($id){
        $clone = ProductClone::find($id);
        if ($clone) {
            $clone->delete();
            return redirect()->route('product_menu')->with('success', 'Data Successfully Deleted');
        } else {
            return redirect()->route('product_menu')->with('error', 'Data Not Found');
        }
    }
    
}
