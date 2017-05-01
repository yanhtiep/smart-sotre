<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Social extends Model
{
    /**
     * The table associated with the model.
     * @var string
     */
    protected $table = 'social_login';

    /*
    * to manage field created_at and updated_at
    */
    public $timestamps = true;

    /**
     * Get the user that owns the seller.
     */
    public function users()
    {
        return $this->belongsTo('App\Models\Users');
    }
}
