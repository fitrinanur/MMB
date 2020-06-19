<?php
/**
 * Created by PhpStorm.
 * User: fitri
 * Date: 10/25/18
 * Time: 3:58 PM
 */
namespace App\Services;

use App\Helpers\ResponseHelper;
use App\City;
use App\Store;
use Illuminate\Support\Facades\Auth;
use App\Services\PictureServices;


class StoreService
{

    public function store($request)
    {
        
        $store = new Store();
        $store->name = $request->name;
        $store->address = $request->address;
        $store->phone_number = $request->phone_number;
        $store->city()->associate($request->city);
        $store->lat = $request->latitude;
        $store->long = $request->longitude;
        $store->desc = $request->description;
        $store->save();

        if ($request->picture) {
            foreach ($request->picture as $pict) {
                $pictureService = new PictureService();
                $picture = $pictureService->store($pict, 'store');
                $store->pictures()->create([
                    'path' => $picture['path'],
                    'file_name' => $picture['name']
                ]);
            }
        }

        return $store;
    }

    /**
     * Update the lodging from request data into database
     * @author Fitri <missfitrina@gmail.com>
     * @param $request
     * @param $lodging
     * @return mixed
     */
    public function update($request, $store)
    {
        $store->name = $request->name;
        $store->address = $request->address;
        $store->city_id =$request->city;
        $store->lat = $request->latitude;
        $store->long = $request->longitude;
        $store->desc = $request->description;
        $store->update();
       
        return $store;

    }

    public function nearbyStore($store, $request)
    {
        // try {
            $stores = Store::selectRaw("
                id,
                city_id,
                name,
                desc,
                address,
                long,
                lat,
                ( 6371 * acos( cos( radians('" . $request->latitude . "') )
                       * cos( radians(lat) )
                       * cos( radians(long)
                       - radians('" . $request->longitude . "') )
                       + sin( radians('" . $request->latitude . "') )
                       * sin( radians(lat) ) ) ) AS distances
            ");

            $stores->with('city');

            $stores = $stores->havingRaw('distances < 000');

            $stores = $stores->whereNotNull('longitude')->get();

            return dd($stores);


    //     }

    //     catch (\Exception $exception) {
    //         return $this->response->failedResponse($exception);
    //     }
    }
}
