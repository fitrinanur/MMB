<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Store extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'name', 'address','telp',
        'lat','long','city_id'
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
			         cos( radians( lat ) )
			         * cos( radians( long ) - radians('.$longitude.')
			         ) + sin( radians('.$latitude.') ) *
			         sin( radians( lat ) ) )
			       ) AS distance';
        $where =   "ROUND(( 10  * 3956 * acos( cos( radians('$latitude') ) * "
            . "cos( radians(lat) ) * "
            . "cos( radians(long) - radians('$longitude') ) + "
            . "sin( radians('$latitude') ) * "
            . "sin( radians(lat) ) ) ) ,8) <=". $radius
            .' and lat IS NOT NULL';
        return $query->select('store.*')
            ->selectRaw($haversine)
            ->whereRaw($where)
            ->orderBy('distance');
    }


}
