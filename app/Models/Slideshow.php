<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Slideshow extends Model
{
    /**
     * The table associated with the model.
     * @var string
     */
    protected $table = 'slideshows';
    /*
    * to manage field created_at and updated_at
    */
    public $timestamps = true;
    
    use SoftDeletes;
    // protected $dates = ['deleted_at'];

    public function stores(){

    	 return $this->belongsTo('App\Models\Store');
    }

      public function galleries()
    {
        return $this->morphMany('App\Models\Galleries', 'galleryable');
    }
}
