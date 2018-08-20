<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Product;
use App\Brand;
use App\Http\Requests\ProductEditFormRequest;
use App\Http\Requests\ProductCreateFormRequest;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::paginate(9);
        return view('backend.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $brands = Brand::all();
        return view('backend.products.create', compact('brands'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductCreateFormRequest $request)
    {
        $file = $request->file('image_url');
        $name = $file->getClientOriginalName();
        $product = new Product(array(
            'name' => $request->get('name'),
            'title' => $request->get('title'),
            'description' => $request->get('description'),
            'price' => $request->get('price'),
            'brand_id' => $request->get('brand_id'),
            'image_url' => 'images/product/'.$name
            ));
        $product->save();
        return redirect(action('Admin\ProductsController@index'))->with('status', '
        The product has been created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);
        $brands = Brand::all();
        $selectedBrands = $product->brand()->pluck('name')->toArray();
        return view('backend.products.edit', compact('product', 'brands', 'selectedBrands'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id, ProductEditFormRequest $request)
    {
        $product = Product::find($id);
        $product->name = $request->get('name');
        $product->title = $request->get('title');
        $product->description = $request->get('description');
        $product->price = $request->get('price');
        $brandID = $request->get('brandID');
        $product->brand_id = $brandID;
        $file = $request->file('image_url');
        $name = $file->getClientOriginalName();
        $product->image_url = 'images/product/'.$name;
        $product->save();
        return redirect(action('Admin\ProductsController@index'))->with('status', '
        The product has been updated!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete();
        return redirect()->back();
    }
}
