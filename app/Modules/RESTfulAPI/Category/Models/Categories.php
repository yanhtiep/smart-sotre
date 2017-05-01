<?php 
namespace App\Modules\RESTfulAPI\Category\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Category as Base_Category;

class Categories extends Base_Category {
	
	
	public function image()
    {
        return $this->morphMany('App\Models\Galleries', 'galleryable')->select(array('path'));
    }
}