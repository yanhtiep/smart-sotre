<?php namespace App\Modules\RESTfulAPI\Foods\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Modules\RESTfulAPI\Foods\Models\Foods as Foods;
use App\Modules\RESTfulAPI\Foods\Models\Shippingfroms as Shippingfroms;
use App\Modules\RESTfulAPI\Foods\Models\Shippings as Shippings;
use App\Modules\RESTfulAPI\Foods\Models\Categories as Categories;
use App\Helpers\Utils as Utils;


use Illuminate\Http\Request;

class FoodsController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return view("RESTfulAPI/Foods::index");
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

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
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
	public function edit($id)
	{
		//
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
	public function destroy($id)
	{
		//
	}


	/*
	*get user limit
	*
	*/
	public function getFoodWithLimitOffset(Request $request){
		$datas	= array();
		$data 	= array();
		try{
			$response = array();
			$foods = Foods::where("created_at","<=",$request->currentDate)->orderBy('created_at', 'desc')->limit($request->limit)->offset($request->offset)->get();
			$num_user_count_from_date = Foods::where("created_at","<=",$request->currentDate)->count();
			foreach ($foods as $food) {

				$data = $food;
				/*if ($food->foods !=""){

					$data['food'] = $food;
				}*/
				array_push($datas, $data);
			}
			$Categories = Categories::All();
			$Shippings = Shippings::All();
			$Shippingfroms = Shippingfroms::All();
			$response["foods"] = $datas;
			$response["Categories"] = $Categories;
			$response["Shippings"] = $Shippings;
			$response["Shippingfroms"] = $Shippingfroms;
			if(($num_user_count_from_date - ($request->limit + $request->offset)) <= 0) $response["isloadmore"] = 0;
			else $response["isloadmore"] = 1;
			return json_encode(Utils::response_success($response));
		}catch(Exception $e){
			return json_encode(Utils::response_error($e));
		}
	}
	/*Add new food */

	public function add(){
		/*--- check email if exist or not --*/

		if (Foods::where('name', '=', $_POST['name'])->exists()) {
			return json_encode(Utils::response_error("This food is already."));
		}
		else{
			$food = new Foods;
			$food->name 	= $_POST['name'];
			$food->price 		= $_POST['price'];
			$food->discount 	= $_POST['discount'];
			$food->exerp 	= $_POST['exerp'];
			$food->categories_id = $_POST['categories'];
			$food->users_id 	= 1;
			$food->save();
				 try {
					foreach ($_POST['shippingfroms'] as $value ) {
						$shipfrom = Shippingfroms::find($value);
						$shipfrom->foods()->attach($food->id);
					}
					foreach ($_POST['shippings'] as $value ) {
						$shiping = Shippings::find($value);
						$shiping->foods()->attach($food->id);
					}
					
					return json_encode(Utils::response_success($food));
				}catch(Exception $e){
					Foods::destroy($food->id);
					return json_encode(Utils::response_error("Unable to create food."));
				}
		}

	}

}
