<?php namespace App\Modules\BackEnd\Index\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

//use Illuminate\Http\Request;
use Auth;
use Request;
use DB;
use App\Modules\BackEnd\Category\Models\Category as Category;
use App\Helpers\Utils as Utils;
class IndexController extends Controller {

  private $api_index;


	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return view("BackEnd/Index::index");
	}

}
