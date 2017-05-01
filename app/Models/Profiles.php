<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profiles extends Model
{
    /**
     * The table associated with the model.
     * @var string
     */
    protected $table = 'profiles';
    /*
    * to manage field created_at and updated_at
    */
    public $timestamps = true;

    protected $fillable = array('firstName', 'lastName', 'email','gender','description');

    public function users()
    {
        return $this->belongsTo('App\Models\Users');
    }
}
