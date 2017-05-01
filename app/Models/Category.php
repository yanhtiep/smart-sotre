<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Category extends Model
{
    /**
     * The table associated with the model.
     * @var string
     */
    protected $table = 'categories';
    /*
    * to manage field created_at and updated_at
    */
    public $timestamps = true;
    
    use SoftDeletes;
    // protected $dates = ['deleted_at'];

    public function stocktypes(){
    	return $this->hasMany('App\Models\Category');
    }

    public function categoryies(){
        return $this->hasMany('\App\Models\Category','parent_id' ,'id');
    }
    public function gimages(){
        return $this->belongsTo('\App\Models\Galleries','id','galleryable_id');
    }
   
}

