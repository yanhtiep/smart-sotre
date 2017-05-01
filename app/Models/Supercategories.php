<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Supercategories extends Model
{
    /**
     * The table associated with the model.
     * @var string
     */
    protected $table = 'supercategories';
    /*
    * to manage field created_at and updated_at
    */
    public $timestamps = true;
    
    use SoftDeletes;
    // protected $dates = ['deleted_at'];

    /**
     * Get the subcategory for supercatetegory.
     */
    public function subcategories()
    {
        return $this->hasMany('App\Models\Subcategories');
    }

    /**
     * Get all of the supercategory's galleries.
     */
    public function galleries()
    {
        return $this->morphMany('App\Models\Galleries', 'galleryable');
    }

    public function users(){
      return $this->belongsToMany('App\Models\Users','supercategory_users')->withTimestamps();
    }

    /*
    * relation of cate with character
    */
    public function collars()
    {
        return $this->belongsToMany('App\Models\Characteristic\Collars', 'collar_supercategories');
    }

    public function colors()
    {
        return $this->belongsToMany('App\Models\Characteristic\Colors', 'color_supercategories');
    }

    public function decorations()
    {
        return $this->belongsToMany('App\Models\Characteristic\Decorations', 'decoration_supercategories');
    }

    public function fabrics()
    {
        return $this->belongsToMany('App\Models\Characteristic\Fabrics', 'fabric_supercategories');
    }

    public function lengths()
    {
        return $this->belongsToMany('App\Models\Characteristic\Lengths', 'length_supercategories');
    }

    public function patterns()
    {
        return $this->belongsToMany('App\Models\Characteristic\Patterns', 'pattern_supercategories');
    }

    public function sizes()
    {
        return $this->belongsToMany('App\Models\Characteristic\Sizes', 'size_supercategories');
    }

    public function sleevelengths()
    {
        return $this->belongsToMany('App\Models\Characteristic\Sleevelengths', 'sleevelength_supercategories');
    }

    public function sleevestyles()
    {
        return $this->belongsToMany('App\Models\Characteristic\Sleevestyles', 'sleevestyle_supercategories');
    }

}
