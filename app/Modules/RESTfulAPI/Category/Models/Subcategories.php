<?php namespace App\Modules\RESTfulAPI\Category\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Subcategories as base_Subcategory;

class Subcategories extends base_Subcategory {

	public function image()
    {
        return $this->morphMany('App\Models\Galleries', 'galleryable')->select(array('path'));
    }

}