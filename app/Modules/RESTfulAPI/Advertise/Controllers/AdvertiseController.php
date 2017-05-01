<?php namespace App\Modules\RESTfulAPI\Advertise\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Modules\RESTfulAPI\Advertise\Models\Advertises as Advertise;
use App\Helpers\Validation as Validation;
use App\Modules\RESTfulAPI\Advertise\Models\Galleries as Gallery;
use App\Helpers\Utils as Utils;
use Carbon\Carbon;

class AdvertiseController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return view("RESTfulAPI\Advertise::index");
		
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}


	public function getAllAddvertisesWithLimitOffset(Request $request)
	{
		$datas	= array();
		$data 	= array();
		try{
			$response = array();
			$advertise = Advertise::where("created_at","<=",$request->currentDate)->orderBy('created_at', 'desc')->limit($request->limit)->offset($request->offset)->get();
			$num_cates_count_from_date = Advertise::where("created_at","<=",$request->currentDate)->count(); 
			foreach ($advertise as $ad) {
				$data = $ad;
				//get field path in morp table(galleries)
				if(count($ad->image) > 0){
					$data['avatar'] = $ad->image[0]['attributes']['path'];
				}
				else{
					$data['avatar'] = " ";
				}
				//remove morp field which come with category
				unset($data['image']);
				array_push($datas, $data);
			}
			$response["positions"] = $datas;
			if(($num_cates_count_from_date - ($request->limit + $request->offset)) <= 0) $response["isloadmore"] = 0;
			else $response["isloadmore"] = 1;
			return json_encode(Utils::response_success($response));
		}catch(Exception $e){
			return json_encode(Utils::response_error($e));
		}
	} 

	public function getAllAdvertises()
	{
		$datas	= array();
		$data 	= array();
		try{
			$advertises = Advertise::All();
			foreach ($advertises as $adsvertise) {
				$data = $adsvertise;
				//get field path in morp table(galleries)
				if(count($adsvertise->image) > 0){
					$data['avatar'] = $adsvertise->image[0]['attributes']['path'];
				}
				else{
					$data['avatar'] = " ";
				}
				//remove morp field which come with category
				unset($data['image']);
				array_push($datas, $data);
			}
			return json_encode(Utils::response_success($datas));
		}catch(Exception $e){
			return json_encode(Utils::response_error($e));
		}
	}

	public function pullToRefresh(Request $request){
		$datas	= array();
		$data 	= array();
		try{
			//prepare to respond
			$response = array("currentDate" => $request->currentDate);
			$lastestDate = "";
			//
			$advertises = Advertise::where("created_at",">",$request->currentDate)->orderBy('created_at', 'desc')->get();
			foreach ($advertises as $adv) {
				//lastest date of datas
				if($lastestDate == ""){
					$lastestDate = $adv["created_at"];
					//"$lastestDate" prevent default data of laravel which not string, also known as covert
					$response["currentDate"] = "$lastestDate";
				}
				$data = $adv;
				//get field path in morp table(galleries)
				if(count($adv->image) > 0){
					$data['avatar'] = $adv->image[0]['attributes']['path'];
				}
				else{
					$data['avatar'] = " ";
				}
				//remove morp field which come with category
				unset($data['image']);
				array_push($datas, $data);
			}
			$response["newAdvertises"] = $datas;
			return json_encode(Utils::response_success($response));
		}catch(Exception $e){
			return json_encode(Utils::response_error($e));
		}
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		$fileImage = $_FILES["fileImage"];

		//validate date
		$today = Carbon::now('Asia/Bangkok');
		$inputday = explode('-', "".date("Y-m-d", strtotime($request->expridate)));
		$daytoday = Carbon::create($today->year, $today->month, $today->day, 0, 0, 0);
		$dayinput = Carbon::create($inputday[0], $inputday[1], $inputday[2], 0, 0, 0);
		if(!$dayinput->gte($daytoday))return json_encode(Utils::response_error(Validation::error_with_message("date must be today or greater then today!")));


		$validation = Validation::_require_input_advertise(array("url" => $request->url));
		if(!$validation)return json_encode(Utils::response_error(Validation::error_missing_params()));

		if(isset($fileImage["type"]))
		{
			$upload_image = Utils::upload_single_image("assets/uploads/advertises",$fileImage);
			if($upload_image['code'] == 0){
				//Invalid file type or size
				return json_encode($upload_image);
			}

			//insert to db here
			try {
				$order_num = Advertise::max('ordering');

				$now = Carbon::now('Asia/Bangkok');
		    	$advertise = new Advertise;
		    	$advertise->cosName 	= $request->name;
			    $advertise->cosPhone 	= $request->phone;
			    $advertise->url 		= $request->url;
			    $advertise->position_id = $request->position_id;
			    $advertise->ordering 	= $order_num+1;
			    $advertise->expridate 	= date("Y-m-d", strtotime($_POST['expridate']));
			    $advertise->created_at	= $now;
			    $advertise->updated_at 	= $now;
			    $advertise->save();

			    //-- gallery
			    $gallery = new Gallery;
			    $gallery = $advertise->galleries()->create(array(
														'path' => $upload_image['data'],
														'created_at'	=> $now,
														'updated_at'	=> $now
													));
			    //get associate selet field of morp
			   	//get new data and current create by lastest date
			   	$new_request = new Request;
			   	$new_request->currentDate = $request->currentDate;
			   	return $this->pullToRefresh($new_request);

			}catch(Exception $e){
				//delete file related from server
				$files = glob('assets/uploads/advertises/*'); // get all file names
				foreach($files as $file){ // iterate files
					if(is_file($file) && $file == $upload_image['data']) unlink($file);//d/elete file
				}
				//response erore
				$error = Utils::response_error(array(
	                	"code" => 430,
        				"description" => "unable to add advertise"
	                ));
				return json_encode($error);
			}	
		}
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit(Request $request)
	{
		$fileImage		= $_FILES["fileImage"];

		//stored old data for rowback info if upload fail
		$oldData 	= Advertise::find($request->id);
		
		$oldImage 	= $oldData->image[0]['path'];

		$newImage	= "";
		$update_data = array();

		//upload new image

		if($fileImage["name"] != ""){
			$newImage = Utils::upload_single_image("assets/uploads/advertises",$fileImage);
			if($newImage['code'] == 0){
				//Invalid file type or size
				return json_encode($newImage);
			}
			$update_data['image'] = $newImage['data'];
		}
		//update filed in db
		try{
			$advertise = Advertise::find($request->id);
			$advertise->url 				= $request->url;
		    $advertise->position_id 	= $request->position_id;
		    $advertise->cosName 	= $request->name;
		    $advertise->cosPhone 	= $request->phone;
		    $advertise->expridate = date("Y-m-d", strtotime($_POST['expridate']));

			$advertise->save();
			//-- gallery
			if($fileImage["name"] != ""){
				$gallery = new Gallery;
				$gallery = $advertise->galleries()->update(array(
														'path' => $update_data['image']
													));
			}

			//delete old icon and image
			$files = glob('assets/uploads/advertises/*'); // get all file names
			foreach($files as $file){ // iterate files

				if($fileImage["name"] != ""){
					if(is_file($file) && $file == $oldImage) unlink($file);//delete file	
				}

			}

			//return data to client
			$data = $advertise;
			if(count($advertise->image) > 0){
				$data['avatar'] = $advertise->image[0]['attributes']['path'];
			}
			else{
				$data['avatar'] = "";
			}
			//remove morp field which come with advertise
			unset($data['image']);

			return json_encode(Utils::response_success($data));

		}catch(Exception $e){
			//delete new image as rowback
			$files = glob('assets/uploads/advertises/*'); // get all file names
			foreach($files as $file){ // iterate files

				if($fileImage["name"] != ""){
					if(is_file($file) && $file == $newImage['data']) unlink($file);//delete file	
				}

			}
			//response erore
			$error = Utils::response_error(array(
	                "code" => 430,
        			"description" => "unable to update advertise"
	            ));
			return json_encode($error);
		}
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function delete(Request $request){ 
		$id = $request->id;
		//store old data
		$advertise = Advertise::find($id);
			//get associate from morp
		$advertise->image;
		$advertise['avatar'] = $advertise->image[0]['attributes']['path'];
		unset($advertise['image']);
		//perform delete with sofedelete which define in migration and model
		$delete = Advertise::find($id)->delete();
		if ($delete){
			//delete image from directory
			$files = glob('assets/uploads/advertises/*'); // get all file names
			foreach($files as $file){ // iterate files
				if(is_file($file) && $file == $advertise['avatar']) unlink($file);//delete file	
			}
			return json_encode(Utils::response_success($advertise));
		}else{
		   return json_encode(Utils::response_error("Unable to delete user."));
		}
	}

}
