<?php
/**
 * Created by PhpStorm.
 * User: fitri
 * Date: 10/25/18
 * Time: 3:58 PM
 */
namespace App\Services;

use App\Helpers\ResponseHelper;
use App\Store;
use Illuminate\Support\Facades\Auth;
use App\Services\PictureServices;
use App\Product;


class ProductService
{

    public function store($request)
    {
        
        $product = new Product();
        $product->name = $request->name;
        $product->productType()->associate($request->product_type);
        $product->desc = $request->description;
        $product->save();

        if ($request->picture) {
            foreach ($request->picture as $pict) {
                $pictureService = new PictureService();
                $picture = $pictureService->store($pict, 'products');
                $product->pictures()->create([
                    'path' => $picture['path'],
                    'file_name' => $picture['name']
                ]);
            }
        }

        return $product;
    }

    /**
     * Update the lodging from request data into database
     * @author Fitri <missfitrina@gmail.com>
     * @param $request
     * @param $lodging
     * @return mixed
     */
    public function update($request, $product)
    {
        $product->name = $request->name;
        $product->product_type_id =$request->product_type;
        $product->desc = $request->description;
        $product->update();
       
        return $product;

    }
}
