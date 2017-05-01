<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Galleries extends Model
{
     /**
     * The table associated with the model.
     * @var string
     */
    protected $table = 'galleries';
    /*
    * to manage field created_at and updated_at
    */
    public $timestamps = true;

    protected $fillable = ['path','caption','status','galleryable_id','galleryable_type'];

    /**
     * Get all of the owning galleriesable models.
     */
    public function galleriesable()
    {
        return $this->belongsTo('\App\Models\Stock');
    }
    public function categories(){
        return $this->belongsTo('\App\Models\Category');
    }
    public function stocks(){
        return $this->belongsTo('\App\Models\Stock');
    }
}
