<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Section extends Model
{
     /**
     * The table associated with the model.
     * @var string
     */
    protected $table = 'sections';
    /*
    * to manage field created_at and updated_at
    */
    public $timestamps = true;
    
    use SoftDeletes;
    // protected $dates = ['deleted_at'];

    public function stocks(){

        return $this->hasMany('App\Models\Stock');
    }
}
