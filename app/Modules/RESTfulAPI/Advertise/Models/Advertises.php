<?php namespace App\Modules\RESTfulAPI\Advertise\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Advertises as base_Advertise;
class Advertises extends base_Advertise {

	public function image()
    {
        return $this->morphMany('App\Models\Galleries', 'galleryable')->select(array('path'));;
    }

}
