<?php 
namespace App\Modules\RESTfulAPI\Category\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Helpers\Utils as Utils;
use App\Http\Helpers as Helpers;
use App\Helpers\Validation as Validation;
use App\Models\Galleries as Galleries;
use App\Models\Category as Categories;
use Carbon\Carbon;
// use Input;
use File;
use App\Modules\RESTfulAPI\Category\Models\Categories as Category;

class CategoryController extends Controller {

	public function store(Request $request){
		$a = $request->txtCateName;
		$unique = Category::where('name',$a)->first();
		$cate = new Category;
			$cate->name 			= $request->txtCateName;
			$cate->description 		= $request->txtDescription;
			$cate->ordering 		= $request->txtOrdering;
			$cate->stock_type_id 	= 1;
			$cate->parent_id 		= $request->sltParent;
			if ($cate) {
				if ($request->hasFile('fImages')){
					$file_name 	= $request->file('fImages')->getClientOriginalName();
					$cate->image = $file_name;
					$request->file('fImages')->move('assets/uploads/category/',$file_name);
					//$img->save();
				}else{
					$cate->name 			= $request->txtCateName;
					$cate->description 		= $request->txtDescription;
					$cate->ordering 		= $request->txtOrdering;
					$cate->stock_type_id 	= 1;
					$cate->parent_id 		= $request->sltParent;
					if ($unique != ""){
						return json_encode(Utils::response_error("Sorry this name exist.")); 
					}elseif($cate->save()){
						return json_encode(Utils::response_success($cate));
					}else{
						return json_encode(Utils::response_error("success"));
					}
			}
			if ($unique != ""){
				return json_encode(Utils::response_error("Sorry this name exist.")); 
			}elseif($cate->save()){
				return json_encode(Utils::response_success($cate));
			}else{
				return json_encode(Utils::response_error("success"));
			}
		}	
	}
	public function update(Request $request,$id) {
		//$a = $request->txtCateName;
		//$unique = Category::where('name',$a)->first();
		$cate = Category::find($id);
		$file = $request->file('fImages');
		$cate->name 			= $request->input('txtCateName');
		$cate->description 		= $request->input('txtDescription');
		$cate->ordering 		= $request->input('txtOrdering'); 
		$cate->stock_type_id 	= 1;
		$cate->parent_id 		= $request->input('sltParent');
		if ($request->file('fImages')) {
			$file_name = $request->file('fImages')->getClientOriginalName();
			$cate->image = $file_name;
			$request->file('fImages')->move('assets/uploads/category/',$file_name);
			if (File::exists($img_current)) {
				File::delete($img_current);
			}
			 echo $file_name;
		}else {
			echo "Not file";
		}		
		// if (strlen($file) > 0) {
		// 	$img_current = $request->img_current;
		// 	if (file_exists(public_path().'assets/uploads/category/'.$img_current)) {
		// 		File::delete(public_path().'assets/uploads/category/'.$img_current);
		// 	}
		// }	
		// $file_name = time().'.'.$file->getClientOriginalName();
		// $destination_path = 'assets/uploads/category/';
		// $file->move($destination_path,$file_name);
		// $cate->image = $file_name;
		$cate->save();
		return redirect()->route('admin.category')->with(['flash_level'=>'success','flash_message'=>'Success !! Complete Edit Category']);
	}
	
	
		
}