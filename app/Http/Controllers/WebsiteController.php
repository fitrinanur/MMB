<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Store;
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

    public function getRecommendation($count = 5){
        if(request()->get('lat') != null && request()->get('lon') != null) {
            $latitude = floatval(request('lat'));
            $longitude = floatval(request('lon'));

            

            $range = 10;

            $stores = Store::location($latitude, $longitude, $range)
                ->get();
            while ($stores->count() < $count) {
                $range += 10;
                $stores = Store::location($latitude, $longitude, $range)
                    ->take($count)
                    ->get();
            }

        }
        else {
            $stores = Store::inRandomOrder()->take($count)->get();
        }

        return view ('website.recommendation',compact('stores','latitude','longitude'));
    }

    /**
     * direction-page
     *
     * @return void
     */
    public function directionPage(Request $request)
    {
        $directionTypes = $this->directionType();

        return view('website.direction', compact('directionTypes')); 
      
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
        // dd($request->all());
        if($request->type == "1"){
            // dd($request->type);
            urlencode($destination = $request->address);
            urlencode($origin = $request->start_location);
            $url = "https://www.google.com/maps/dir/?api=1&origin=".$origin."&destination=".$destination;
            // https://maps.google.com?saddr=".$origin."&daddr=".$destination314+Avery+Avenue+Syracuse+NY+13204
            return redirect()->away($url);
           
        }else{
            $lat = $request->latitude;
            $lang = $request->longitude;

            $lat1 = request()->get('lat');
            $lon = request()->get('lon');
            $url = "https://www.google.com/maps/dir/Current+Location/".$lat.",".$lang;
            return redirect()->away($url);
        }
    }
}
