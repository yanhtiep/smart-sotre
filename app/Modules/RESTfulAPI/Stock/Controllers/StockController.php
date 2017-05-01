<?php 
namespace App\Modules\RESTfulAPI\Stock\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Helpers\Utils as Utils;
use App\Http\Helpers as Helpers;
use App\Helpers\Validation as Validation;
use App\Models\Galleries as Galleries;
use Carbon\Carbon;
use Input,File;
use App\Modules\RESTfulAPI\Stock\Models\Stock as Stock;

class StockController extends Controller {

	public function store (Request $request) {
		$a = $request->txtStockName;
		$unique = Stock::where('name',$a)->first();
		$path_img = "assets/uploads/stocks/alias/";
		$file_name = $request->file('fImages')->getClientOriginalName();
		$stock = new Stock;
		$stock->name 			= $request->txtStockName;
		$stock->cost 			= $request->txtCost;
		$stock->discount 		= $request->sldiscount;
		$stock->stock_code 		= $request->txtStockcode;
		$stock->quote_code 		= $request->txtQuotecode;
		$stock->meta_keyword 	= $request->txtKeywords;
		$stock->qty 			= $request->txtQuantity;
		$stock->min_order_allow = $request->txtMinorder;
		$stock->max_order_allow = $request->txtMaxorder;
		$stock->reorder_qty 	= $request->txtReorderQuantity;
		$stock->rating_num 		= $request->txtRate;
		$stock->review_num 		= $request->txtReview;
		$stock->expired_date 	= $request->txtdate;
		$stock->status 			= $request->rdoStatus;
		$stock->description 	= $request->txtDescription;
		$stock->category_id 	= $request->sltParent;
		$stock->currency_id 	= 1;
		$stock->stock_uom_id 	= 1;
		$stock->store_id 		= 1;
		$stock->condition_id 	= 1;
		$stock->image 			= $file_name;	
		$request->file('fImages')->move('assets/uploads/stocks/',$file_name);
		if ($unique != ""){
			return json_encode(Utils::response_error("Sorry this name exist.")); 
		}else{
			$stock->save();
		}		
		$stock_id = $stock->id;
		if ($request->hasFile('ImagesDetail')){
			foreach ($request->file('ImagesDetail') as $file) {
				$stock_img = new Galleries;
				if (isset($file)) {
					$stock_img->caption = $file->getClientOriginalName();
					$stock_img->path 			= $path_img;
					$stock_img->galleryable_id	= $stock_id;
					$file->move('assets/uploads/stocks/alias/',$file->getClientOriginalName());
					$stock_img->save();
				}
			}			
		}
			
		return json_encode(Utils::response_success($stock));	
	}
	public function update(Request $request,$id) {
		$path_img = "assets/uploads/stocks/alias/";
		$stock = Stock::find($id);
		$stock->name 			= $request->input('txtStockName');
		$stock->cost 			= $request->input('txtCost');
		$stock->discount 		= $request->sldiscount;
		$stock->stock_code 		= $request->input('txtStockcode');
		$stock->quote_code 		= $request->input('txtQuotecode');
		$stock->meta_keyword 	= $request->input('txtKeywords');
		$stock->qty 			= $request->input('txtQuantity');
		$stock->min_order_allow = $request->input('txtMinorder');
		$stock->max_order_allow = $request->input('txtMaxorder');
		$stock->reorder_qty 	= $request->input('txtReorderQuantity');
		$stock->rating_num 		= $request->input('txtRate');
		$stock->review_num 		= $request->input('txtReview');
		$stock->expired_date 	= $request->input('txtdate');
		$stock->status 			= $request->input('rdoStatus');
		$stock->description 	= $request->input('txtDescription');
		$stock->category_id 	= $request->input('sltParent');
		$stock->currency_id 	= 1;
		$stock->stock_uom_id 	= 1;
		$stock->store_id 		= 1;
		$stock->condition_id 	= 1;
		$img_current = 'assets/uploads/stocks/'.$request->input('img_current');
		if ($request->file('fImages')) {
			$file_name = $request->file('fImages')->getClientOriginalName();
			$stock->image = $file_name;
			$request->file('fImages')->move('assets/uploads/stocks/',$file_name);
			if (File::exists($img_current)) {
				File::delete($img_current);
			}
			 echo $file_name;
		}else {
			echo "Not file";
		}	
		$stock->save();
		if (!empty($request->file('fEditImages'))){
			foreach ($request->file('fEditImages') as $file) {
				$stock_img = new Galleries;
				if (isset($file)) {
					$stock_img->caption = $file->getClientOriginalName();
					$stock_img->path 			= $path_img;
					$stock_img->galleryable_id	= $id;
					$file->move('assets/uploads/stocks/alias/',$file->getClientOriginalName());
					$stock_img->save();	
				}
			}
					
		}		
		
	return redirect()->route('admin.stock')->with(['flash_level'=>'success','flash_message'=>'Success !! Complete Edit Stock']);
	}
}

