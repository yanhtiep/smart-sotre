<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Advertises extends Model
{
    /**
     * The table associated with the model.
     * @var string
     */
    protected $table = 'advertises';
    /*
    * to manage field created_at and updated_at
    */
    public $timestamps = true;
    
    /**
     * Get all of the advertise's galleries.
     */
    public function galleries()
    {
        return $this->morphMany('App\Models\Galleries', 'galleryable');
    }

    public function blogs(){
        return $this->belongsToMany('App\Models\Blogs','advertise_blogs')->withTimestamps();
    }

    public function stores(){
        return $this->belongsTo('App\Models\Store');
    }


}
