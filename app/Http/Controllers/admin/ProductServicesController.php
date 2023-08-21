<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\ProductServices;
use App\Http\Requests\StoreProductServicesRequest;
use App\Http\Requests\UpdateProductServicesRequest;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\Service;
use Illuminate\Http\Request;

class ProductServicesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();
        $categories = ProductCategory::all();
        $services = Service::all();
        return view('admin.productAndService.create_product_services', ['products' => $products, 'services' => $services, 'categories' => $categories]);
    }


    public function create_product()
    {
        $categories = ProductCategory::all();
        return view('admin.productAndService.create_product', compact( 'categories'));
    }

    public function create_services()
    {
        $products = Product::all();
        return view('admin.productAndService.create_services', ['products' => $products]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store_service(Request $request)
    {
        $request->validate([
            'product' => 'required | unique:services',
            'services' => 'required',
        ]);

        $service = new Service();
        $service->product = $request->product;

        $service->options = implode(', ', $request->services ?? []);;



        if ($service->save()) {
            return redirect()->route('create_services');
        }
    }

    public function store_product(Request $request)
    {
        $request->validate([
            'name' => 'required | unique:products',
            'category' => 'required',
        ]);

        $product = new Product();
        $product->name = $request->name;
        $product->category = $request->category;


        if ($product->save()) {
            return redirect()->route('product_service.index');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(ProductServices $productServices)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        return route('edit_product_services', $id);
    }

    /**
     * Update the specified resource in storage.
     */


    public function update(Request $request,)
    {
        $product = Product::find($request->id);
        $product->name = $request->name;
        $product->category = $request->category;
        $product->save();
        return route('product_service.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy_product($id)
    {

        $productid = Product::where('id', $id)->pluck('name');
        $product = Product::where('name', $productid)->first();

        if ($product) {
            $product->delete();
            return redirect()->back();
        }
    }

    public function destroy_service($id)
    {
        $serviceid = Service::where('id', $id)->pluck('product');;
        $service = Service::where('product', $serviceid)->first();
        if ($service) {
            $service->delete();
            return redirect()->back()->with(['success' => 'Service Deleted Successfully']);
        }
    }
}
