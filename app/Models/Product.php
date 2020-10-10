<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Status;
use App\Models\User;

class Product extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'price', 'description', 'bedrooms', 'bathrooms', 'status_id', 'user_id',
    ];
    
    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = true;

    /**
     * Function to get the images for a product
     */
    public function product_images()
    {
        return $this->hasMany('App\Models\Image');
    }

    /**
     * Function to get the status of a product
     */
    public function product_status()
    {
        return $this->belongsTo('App\Models\Status');
    }

    /**
     * Function to get the user or creator of a product
     */
    public function product_user()
    {
        return $this->belongsTo('App\Models\User');
    }

}
