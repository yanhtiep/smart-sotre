<?php namespace App\Modules\BackEnd\Category\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Http\Helpers as Helpers;
use App\Models\Galleries as Galleries;
use App\Models\Category as Categories;
use App\Modules\BackEnd\Category\Models\Category as Category;
use App\Modules\RESTfulAPI\Category\Controllers\CategoryController as API_CategoryController;
use Illuminate\Support\Facades\Session;

class CategoryController extends Controller {

	protected $view_namespace = 'BackEnd/Category::Category/';
	//protected $view_namespace1 = 'layouts.frontend.partials';
	private $api_con_category;
	
	public function __construct(API_CategoryController $api_category)
    {
        $this->api_con_category 	= $api_category;
    }

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index(){
		$data = Category::paginate(20);
		return view($this->view_namespace.'index',compact('data'));
	}
	
	public function getEdit ($id) {
		$cate = Category::select('id','name','parent_id','status')->get()->toArray();
		$info = Category::find($id);
		return view($this->view_namespace.'edit',compact('cate','info'));

	}

	public function getDelete ($id) {
		$cate = Category::find($id)->delete();
		// $galleries = Galleries::where('galleryable_id',$id)->delete();
		return Redirect()->route('admin.category')->with(['flash_level'=>'success','flash_message'=>'Success !! Complete Delete Category']);
	}
	
	
}