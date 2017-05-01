<?php namespace App\Modules\BackEnd\Foods\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Modules\RESTfulAPI\Foods\Controllers\FoodsController as API_FoodsController;
use Carbon\Carbon;
use App\Modules\RESTfulAPI\Index\Controllers\IndexController as API_IndexController;
use Auth;
use Illuminate\Http\Request;
class FoodsController extends Controller {

	protected $view_namespace = 'BackEnd/Foods';
	private $some_service;

    public function __construct(API_FoodsController $api_food_controller)
    {
        $this->some_service = $api_food_controller;
    }

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$now = Carbon::now('Asia/Bangkok');
		$request = new Request;
		$request->currentDate = $now;
		$request->limit 	= 10;
		$request->offset 	= 0;
		$food_data = json_decode($this->some_service->getFoodWithLimitOffset($request),true);
		$duser = new API_IndexController;
		$id = Auth::user()->id;
		$datausers = json_decode($duser->show($id),true);
		$foods = array();

		if($food_data['code'] == 1){
			$foods = $food_data["data"];
			$datauser = $datausers["data"];
		}
		//echo json_encode($food_data);

		$data =  array(
				"foods" 	=> $foods['foods'],
				"currentDate"	=> $now,
				"categories" => $foods['Categories'],
				"shippings" => $foods['Shippings'],
				"shippingfroms" => $foods['Shippingfroms'],
				"menu" => $datauser['menu']
			);

		return view($this->view_namespace."::index")->with($data);

	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view($this->view_namespace."::create");
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

}
