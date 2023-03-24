<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product_Category;

class ProductCategoryController extends Controller
{
    public function index()
    {
        $category = Product_Category::all();
        if (!is_array($category)) {
        }
        return view('addcategory', compact('category'));
    }
    

    public function create()
    {
        $category = Product_Category::all();
        return view('addcategory', compact('category'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id' => 'required|digits:1|unique:product__categories,id',
            'product_category' => 'required|max:255|unique:product__categories,product_category'], 
            [ 'id.digits' => 'ID must be exactly 1 digit.','id.unique' => 'ID already exists in the database.',
            'product_category.unique' => 'Product category already exists in the database.',
            'product_category.max' => 'Product category must not exceed 255 characters.']);


    
        Product_Category::create($request->all());
    
        return redirect()->route('category')
            ->with('success', 'Category created successfully.');
    }
    

    

    public function show($id)
    {
        $category = Product_Category::findOrFail($id);
        return view('category_update', compact('category'));
    }
    public function edit($id)
    {
        $category = Product_Category::find($id);
        return view('category_update', compact('category'));
    }
    
    public function update(Request $request, $id)
    {
        $request->validate([
            'product_category' => 'required|unique:product__categories|max:255'
        ]);
    
        $category = Product_Category::find($id);
        $category->product_category = $request->product_category;
        $category->save();
    
        return redirect()->route('category')
            ->with('success', 'Category updated successfully.');
    }

    public function destroy($id)
    {
        $categories = Product_Category::findOrFail($id);
        $categories->delete();

        return redirect()->route('category')
            ->with('success', 'Category deleted successfully.');
    }
}
