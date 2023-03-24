<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product_Management;
use App\Models\User;
use App\Models\ProductClone;
use Illuminate\Support\Facades\Auth;

class ProductCloneController extends Controller
{
    public function index()
    {
        $user_id = auth()->user() ? auth()->user()->user_id : 'Unknown';
        $clone = ProductClone::where('user_id', $user_id)->get();
        return view('cart', compact('clone'));
    }
    
    public function clone(Request $request)
    {
        $product_id = $request->input('product_id');
        $product = Product_Management::find($product_id);
        
        $clone = ProductClone::where('product_id', $product_id)->first();
        
        if ($clone) {
            $clone->product_stock += 1;
            $clone->save();
        } else {
            $clone = new ProductClone();
            $clone->fill($product->attributesToArray());
            $clone->product_stock = 1;
            $clone->user_id = auth()->User() ? auth()->User()->user_id : 'Unknown'; 
            $clone->save();
        }
        
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
