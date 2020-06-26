<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Product extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'name', 'product_type_id','desc'
    ];

    public function productType()
    {
        return $this->belongsTo(ProductType::class);
    }
}