<?php namespace App\Modules\BackEnd\Advertise\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use Carbon\Carbon;

use App\Modules\RESTfulAPI\Advertise\Controllers\AdvertiseController as API_AdvertiseController;


class AdvertiseController extends Controller {

	protected $view_namespace = 'BackEnd/Advertise::';
	private $api_con_advertise;
	private $api_con_advertises;

    public function __construct(API_AdvertiseController $api_advertise_controller)
    {
        $this->api_con_advertise = $api_advertise_controller;
        $this->api_con_advertises = new API_AdvertiseController;
    }

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//return view("BackEnd/Advertise::index");

		$now = Carbon::now('Asia/Bangkok');
		$request = new Request;
		$request->currentDate = $now;
		$request->limit 	= 3;
		$request->offset 	= 0;
		
		$add_data = json_decode($this->api_con_advertise->getAllAddvertisesWithLimitOffset($request), true);
		$advertises = array();
		
		if($add_data['code'] == 1){
			$advertises = $add_data["data"];
		}

		$data =  array(
				"advertises" 	=> $advertises['positions'],
				"isLoadMore"	=> $advertises['isloadmore'],
				"currentDate"	=> $now
			);
		return view($this->view_namespace."index")->with($data);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view($this->view_namespace."create");
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
