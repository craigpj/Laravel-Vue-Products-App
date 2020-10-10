<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    use HasFactory;

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = true;

    /**
     * The products that have this status.
     */
    public function products()
    {
        return $this->hasMany('App\Models\Product');
    }

    /**
     * The images that have this status.
     */
    public function images()
    {
        return $this->hasMany('App\Models\Image');
    }    

}
