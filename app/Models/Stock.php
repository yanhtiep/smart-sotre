<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Stock extends Model
{
    /**
     * The table associated with the model.
     * @var string
     */
    protected $table = 'stocks';

    protected $fillable = ['name','stock_code','quote_code','meta_keyword','reorder_qty','description','review_num','rating_num','expired_date','min_order_allow','max_order_allow','qty','cost','discount','status','image','category_id','currency_id','stock_uom_id','store_id','condition_id'];
    /*
    * to manage field created_at and updated_at
    */
    public $timestamps = true;
    
    use SoftDeletes;
    // protected $dates = ['deleted_at'];

    public function stores(){
    	return $this->belongsTo('App\Models\Store');
    }

     public function conditions(){
    	return $this->belongsTo('App\Models\Condition');
    }

     public function currencies(){
    	return $this->belongsTo('App\Models\Currency');
    }
    public function stockuoms(){

    	return $this->belongsTo('App\Models\StockUom');
    }

    public function sections(){
    	return $this->hasMany('App\Models\Section');
    }

      public function galleries()
    {
        return $this->morphMany('App\Models\Galleries', 'galleryable');
    }
      public function gimagess()
    {
        return $this->belongsTo('App\Models\Galleries','id','galleryable_id','galleryable_type');
    }
    public function stockbalance(){

        return $this->belongsTo('App\Models\StockBalance');
    }

    public function stockmove(){

        return $this->belongsTo('App\Models\StockMove');
    }

}
