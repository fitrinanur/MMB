<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Store;
use App\City;
use App\Services\StoreService;
use App\Services\PictureService;

class StoreController extends Controller
{
    private $store;
    /**
    * StoreController constructor.
    */
    public function __construct()
    {
       $this->middleware('auth');

       $this->store = new StoreService();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stores = Store::all();
        return view('stores.index',compact('stores'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cities = City::all();
        return view('stores.create', compact('cities'));
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
            $this->store->store($request);

            flash('Tambah toko berhasil!')->success();
            return redirect()->route('store.index');
         }
        catch (\Exception $exception) {
            flash($exception->getMessage())->error();
            return redirect()->back();
        }
        return redirect()->route('store.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $store = Store::find($id);
        return view('stores.show',compact('store'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cities = City::all();
        $store  = Store::find($id);  
        return view('stores.edit', compact('cities','store'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Store $store)
    {
        try {
            $store = $this->store->update($request,$store);

            flash('Update Toko berhasil!')->success();
            return redirect()->route('store.index');
        }
         catch (\Exception $exception) {
             flash($exception->getMessage())->error();
             return redirect()->back();
        }

        return redirect()->route('store.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $store =  Store::findOrFail($id);
        $store->delete();

        return redirect()->route('store.index');
    }
}
