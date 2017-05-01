<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    /**
     * The table associated with the model.
     * @var string
     */
    protected $table = 'stores';
    /*
    * to manage field created_at and updated_at
    */
    public $timestamps = true;
    
    use SoftDeletes;
    // protected $dates = ['deleted_at'];

     public function staffranges(){

    	return $this->belongsTo('App\Models\StaffRange');
    }

     public function revenueranges(){

    	return $this->belongsTo('App\Models\RevenueRange');
    }

    public function businestypes(){

    	return $this->belongsTo('App\Models\BusinessType');
    }

    public function countries(){
    	return $this->belongsTo('App\Models\Country');
    }

    public function stocks(){
        
        return $this->hasMany('App\Models\Stock');
    }

    public function slideshows(){
        return $this->hasMany('App\Models\Slideshow');
    }

      public function galleries()
    {
        return $this->morphMany('App\Models\Galleries', 'galleryable');
    }

    public function advertises(){
        return $this->hasMany('App\Models\Advertises');
    }

}
