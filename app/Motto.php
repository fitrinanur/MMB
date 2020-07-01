<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Motto extends Model
{
    protected $fillable = [
        'category', 'desc'
    ];
}
