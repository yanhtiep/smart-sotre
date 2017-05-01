<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Attribute extends Model
{
    /**
     * The table associated with the model.
     * @var string
     */
    protected $table = 'attributes';
    /*
    * to manage field created_at and updated_at
    */
    public $timestamps = true;
    
    use SoftDeletes;
    // protected $dates = ['deleted_at'];

    public function attributetypes(){
        return $this->hasMany('App\Models\AttributeType');
    }
    public function attributevalues(){
        rreturn $this->hasMany('App\Models\AttributeValue');
    }
}
