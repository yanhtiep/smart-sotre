<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class AttributeValue extends Model
{
   /**
     * The table associated with the model.
     * @var string
     */
    protected $table = 'attribute_types';
    /*
    * to manage field created_at and updated_at
    */
    public $timestamps = true;
    
    use SoftDeletes;
    // protected $dates = ['deleted_at'];

     public function attributes()
    {
        return $this->hasMany('App\Models\Attribute');
    }
}
