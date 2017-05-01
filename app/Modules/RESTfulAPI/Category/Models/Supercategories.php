<?php namespace App\Modules\RESTfulAPI\Category\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Supercategories as base_Supercategory;

class Supercategories extends base_Supercategory {

	public function image()
    {
        return $this->morphMany('App\Models\Galleries', 'galleryable')->select(array('path'));;
    }

}
