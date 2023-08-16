<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\ProductCategory;
use Illuminate\Http\Request;

class ProductCategoryController extends Controller
{

    public function index(){
        $productCategories = ProductCategory::all();
        return view('admin.create_category', compact('productCategories'));
    }
    public function create_category(Request $request) {
        $category = new ProductCategory();
        $request->validate([
            'category_name' => 'required|unique:product_categories|max:255',
        ]);

        $category->category_name = $request->category_name;
        if($category->save()){
            return redirect()->route('product_service.index')->with('success','Category created successfully.');
        }else{
            return redirect()->back()->withErrors('Something went wrong.');
        }
    }

    public function edit_category($id)
    {
        $category = ProductCategory::find($id);
        if (!$category) {
            return redirect()->back()->withErrors('Category not found.');
        }else{
            return view('admin.edit_category',compact('category'));
        }
    }

    public function update_category(Request $request){
        $request->validate([
            'category_name' => 'required|max:255',
        ]);

        $category = ProductCategory::find($request->id);
        $category->category_name = $request->category_name;
        if($category->save()){
            return redirect()->view('admin.create_product_services')->with('success','Category updated successfully.');
        }else{
            return redirect()->back()->withErrors('Something went wrong.');
        }
    }

    public function destroy_category($id)
    {
        $category = ProductCategory::find($id);
        if (!$category) {
            return redirect()->back()->withErrors('Category not found.');
        } else {
            $category->delete();
            return redirect()->route('product_service.index')->with('success','Category deleted successfully.');
        }
    }
}
