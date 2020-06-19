<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Picture extends Model
{
    use SoftDeletes;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'pictureable_id',
        'pictureable_type',
        'path',
        'file_name',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphTo
     */
    public function pictureable()
    {
        return $this->morphTo();
    }

    public function path()
    {
        return asset('storage/images/'.$this->path.'/'.$this->file_name);
    }
}
