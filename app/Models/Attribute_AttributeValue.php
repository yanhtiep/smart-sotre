<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Attribute_AttributeValue extends Model
{
   /**
     * The table associated with the model.
     * @var string
     */
    protected $table = 'attribute_attribute_values';
    /*
    * to manage field created_at and updated_at
    */
    public $timestamps = true;
    
    use SoftDeletes;
    // protected $dates = ['deleted_at'];
}
