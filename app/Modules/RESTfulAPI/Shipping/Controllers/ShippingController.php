<?php namespace App\Modules\RESTfulAPI\Shipping\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Modules\RESTfulAPI\Shipping\Models\Shipping as Shipping;
use App\Helpers\Validation as Validation;
use App\Helpers\Utils as Utils;
use Carbon\Carbon;
class ShippingController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return view("RESTfulAPI/Shipping::index");
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

	public function getAllShippingWithLimitOffset(Request $request)
	{
		$datas	= array();
		$data 	= array();
		try{
			$response = array();
			$shippings = Shipping::where("created_at","<=",$request->currentDate)->orderBy('created_at', 'desc')->limit($request->limit)->offset($request->offset)->get();
			$num_cates_count_from_date = Shipping::where("created_at","<=",$request->currentDate)->count(); 

			foreach ($shippings as $shipping) {
				$data = $shipping;
				array_push($datas, $data);
			}

			
			$response["shipping"] = $datas;
			if(($num_cates_count_from_date - ($request->limit + $request->offset)) <= 0) $response["isloadmore"] = 0;
			else $response["isloadmore"] = 1;
			return json_encode(Utils::response_success($response));
		}catch(Exception $e){
			return json_encode(Utils::response_error($e));
		}
	}

}
