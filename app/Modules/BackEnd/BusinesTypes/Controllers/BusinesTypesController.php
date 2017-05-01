<?php namespace App\Modules\BackEnd\BusinesTypes\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Modules\RESTfulAPI\BusinesTypes\Controllers\BusineTypesController as API_BusinesTypesController;
use Carbon\Carbon;
use Auth;

class BusinesTypesController extends Controller {

	protected $view_namespace = 'BackEnd/BusinesTypes';
	private $some_service;

    public function __construct(API_BusinesTypesController $api_businestype_controller)
    {
        $this->some_service = $api_businestype_controller;
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
		$businestype_data = json_decode($this->some_service->getAllABusinesstisesWithLimitOffset($request),true);
		$duser = new BusinesTypesController;
		$businestypes = array();

		if($businestype_data['code'] == 1){
			$businestypes = $businestype_data["data"];
		}
		//echo json_encode($food_data);

		$data =  array(
				"businestypes" 	=> $businestypes['businestypes'],
				"currentDate"	=> $now,
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

}
