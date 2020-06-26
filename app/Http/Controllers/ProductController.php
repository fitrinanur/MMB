<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\ProductType;
use App\Services\ProductService;

class ProductController extends Controller
{
    private $product;
    /**
    * StoreController constructor.
    */
    public function __construct()
    {
       $this->middleware('auth');

       $this->product = new ProductService();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        return view('products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $product_types = ProductType::all();
        return view('products.create', compact('product_types'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $this->product->store($request);

            flash('Tambah product berhasil!')->success();
            return redirect()->route('product.index');
         }
        catch (\Exception $exception) {
            flash($exception->getMessage())->error();
            return redirect()->back();
        }
        return redirect()->route('product.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::findOrFail($id);
        return view('products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $product_types = ProductType::all();
        return view('products.edit', compact('product','product_types'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        try {
            $product = $this->product->update($request,$product);

            flash('Update Product berhasil!')->success();
            return redirect()->route('product.index');
        }
         catch (\Exception $exception) {
             flash($exception->getMessage())->error();
             return redirect()->back();
        }

        return redirect()->route('product.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product =  Product::findOrFail($id);
        $product->delete();

        return redirect()->route('product.index');
    }
}
