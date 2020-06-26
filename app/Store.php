<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;

class Store extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'name', 'address','telp',
        'latitude','longitude','city_id'
    ];

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function pictures()
    {
        return $this->morphMany(Picture::class, 'pictureable');
    }

    public function scopeLocation(Builder $query, $latitude, $longitude, $radius = 10){
        $haversine = '( 3959 * acos( cos( radians('.$latitude.') ) *
			         cos( radians( latitude ) )
			         * cos( radians( longitude ) - radians('.$longitude.')
			         ) + sin( radians('.$latitude.') ) *
			         sin( radians( latitude ) ) )
			       ) AS distance';
        $where =   "ROUND(( 10  * 3956 * acos( cos( radians('$latitude') ) * "
            . "cos( radians(latitude) ) * "
            . "cos( radians(longitude) - radians('$longitude') ) + "
            . "sin( radians('$latitude') ) * "
            . "sin( radians(latitude) ) ) ) ,8) <=". $radius
            .' and latitude IS NOT NULL';
        return $query->select('stores.*')
            ->selectRaw($haversine)
            ->whereRaw($where)
            ->orderBy('distance');
    }


}
