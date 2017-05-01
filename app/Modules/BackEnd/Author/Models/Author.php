<?php
namespace App\Modules\BackEnd\Author\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Users as users;
//use SoftDeletes;

class Author extends users
{

    // protected $table = 'users';
    // public $timestamps = false;
    // protected $dates = ['deleted_at'];

    // public function socialLogin()
    // {
    //     return $this->hasMany('App\Models\socialTable', 'social-login', 'id');
    // }

    // public function profile()
    // {
    //     return $this->hasOne('App\Modules\ProfileTable');
    // }

}

