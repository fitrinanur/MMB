<?php
/**
 * Created by PhpStorm.
 * User: fitri
 * Date: 10/25/18
 * Time: 3:58 PM
 */
namespace App\Services;

use App\Helpers\ResponseHelper;

class PictureService
{
    public function store($picture, $type)
    {
        switch ($type) {
            case 'store':
                $folder = 'stores';
                break;
            case 'product':
                $folder = 'products';
                break;
            default:
                $folder = '';
                break;
        }


        $newName = uniqid().'.'.$picture->getClientOriginalExtension();

        $picture->move(public_path('storage/images/'. $folder), $newName);

        return [
            'path' => $folder,
            'name' => $newName
        ];
    }
}