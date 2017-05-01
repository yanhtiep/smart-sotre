<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class ShippingCompany extends Model
{
   
     /**
     * The table associated with the model.
     * @var string
     */
    protected $table = 'shipping_companie';
    /*
    * to manage field created_at and updated_at
    */
    public $timestamps = true;
    
    use SoftDeletes;
    // protected $dates = ['deleted_at'];
    

     public function countries(){

    	return $this->belongsTo('App\Models\Country');
    }
}
