<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Store;
use App\ProductType;
use App\Product;
use App\Services\StoreService;

class WebsiteController extends Controller
{
    private $store;

     /**
     * __construct
     *
     * @return void
     */
    public function __construct()
    {
        $this->store = new StoreService();
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stores =  Store::limit(3);
        return view('website.index',compact('stores'));
    }

    public function getRecommendation($count = 3){
        if(request()->get('lat') != null && request()->get('lon') != null) {
            $latitude = floatval(request('lat'));
            $longitude = floatval(request('lon'));

            

            $range = 30;
            /* for easy to calculate range/radius you need remember this
            * 1meter  = 10
            * 2meter  = 20
            * 3meter  = 30
            * ....
            * ...etc
            */

            $stores = Store::location($latitude, $longitude, $range)
                    ->take($count)
                    ->get();
            // while ($stores->count() < $count) {
            //     $range  += 20;
            //     $stores = Store::location($latitude, $longitude, $range)
            //         ->take($count)
            //         ->get();
            // }
        }
        else {
            $stores = "Tidak ditemukan";
            // $stores = Store::inRandomOrder()->take($count)->get();
        }

        return view ('website.recommendation',compact('stores','latitude','longitude'));
    }

    /*
     * direction-page
     *
     * @return void
     */
    public function directionPage(Request $request)
    {
        $directionTypes = $this->directionType();
        $stores = Store::all();
        return view('website.direction', compact('directionTypes','stores')); 
      
    }

    public function nearlyPage()
    {
        
        return view('website.nearly');
    }

    private function directionType()
    {
        $directionTypes =
        [
            '1' => 'Alamat',
            '2' => 'Longitude&Latitude',
        ];

        return $directionTypes;
    }

    public function directionStore(Request $request)
    {
        $id = ($request->store_id);
        $get_store = Store::find($id);
        $lat_dest = $get_store->latitude;
        $long_dest = $get_store->longitude;

        $url = "https://www.google.com/maps/dir/Current+Location/".$lat_dest.",".$long_dest;
        return redirect()->away($url);
    
        // if($request->type == "1"){
        //     // dd($request->type);
        //     urlencode($destination = $request->address);
        //     urlencode($origin = $request->start_location);
        //     $url = "https://www.google.com/maps/dir/?api=1&origin=".$origin."&destination=".$destination;
        //     $url = "https://www.google.com/maps/dir/?api=1&origin=".$origin."&destination=".$lat_dest.",".$long_dest;
        //     return redirect()->away($url);
           
        // }else{
        //     $lat = $request->latitude;
        //     $lang = $request->longitude;

        //     $lat1 = request()->get('lat');
        //     $lon = request()->get('lon');
        //     $url = "https://www.google.com/maps/dir/Current+Location/".$lat.",".$lang;
        //     return redirect()->away($url);
        // }
    }

    public function displayStore()
    {
        $stores = Store::all();
        return view('website.store', compact('stores'));
    }

    public function displayProduct()
    {
        $product_types = ProductType::all();
        $products = Product::all();
        return view('website.product', compact('products','product_types'));
    }
    public function displayProductShow($id)
    {
       
        $product_types = ProductType::all();
        $products = Product::findOrFail($id);
        return view('website.detail', compact('products','product_types'));
    }
}
