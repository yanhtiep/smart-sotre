<?php
/**
 * Created by PhpStorm.
 * User: sonvisal
 * Date: 10/10/2016
 * Time: 07:49
 * update by Pheaktra 14/10/2016 relation
 */
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Auth;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;

class Users extends Model
{
    /**
     * The table associated with the model.
     * @var string
     */
    protected $table = 'users';
    /*
    * to manage field created_at and updated_at
    */
    public $timestamps = true;
    /**
    * The attributes that should be mutated to dates.
    * @var array
    */
    use SoftDeletes;
    protected $dates = ['deleted_at'];

    public function socialLogin()
    {
        return $this->hasMany('App\Models\Social');
    }

    /**
     * The product that belong to the user.
     */
    public function products()
    {
    	/* it's free to override the convention of relationship table name*/
        return $this->belongsToMany('App\Models\Products', 'users_products');
    }
    public function profile(){
         return $this->hasOne('App\Models\Profiles');
    }

    /*
    * check role user
    */
    public function isAdmin()
    {
      $role = Auth::user()->role;
      if ($role = 'admin'){
          return true;
      }

      return false;
    }
    /*
    * check user role moderator
    */
    public function isModerator()
    {
      $role = Auth::user()->role;
      if ($role = 'moderator'){
          return true;
      }

      return false;
    }

    /*
    * check user role seller
    */
    public function isSeller()
    {
      $role = Auth::user()->role;
      if ($role = 'seller'){
          return true;
      }

      return false;
    }

    /*
    * check user role customer
    */
    public function isCustomer()
    {
      $role = Auth::user()->role;
      if ($role = 'customer'){
          return true;
      }

      return false;
    }

    public function categories(){
      return $this->belongsToMany('App\Models\Categories');
    }


    public function supercategories(){
      return $this->belongsToMany('App\Models\Supercategories','supercategory_users')->withTimestamps();
    }

    /**
     * Get the products for the users.
     */
    public function womencloths()
    {
        return $this->hasMany('App\Models\Product\Womencloths');
    }

    public function mencloths()
    {
        return $this->hasMany('App\Models\Product\Mencloths');
    }

    public function cosmetics()
    {
        return $this->hasMany('App\Models\Product\Cosmetics');
    }

    public function electronics()
    {
        return $this->hasMany('App\Models\Product\Electronics');
    }

    public function foods()
    {
        return $this->hasMany('App\Models\Product\Foods');
    }

    public function toys()
    {
        return $this->hasMany('App\Models\Product\Toys');
    }
}
