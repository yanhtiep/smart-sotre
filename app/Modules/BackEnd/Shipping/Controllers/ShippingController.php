<?php namespace App\Modules\BackEnd\Shipping\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Modules\RESTfulAPI\Shipping\Controllers\ShippingController as API_ShippingController;

class ShippingController extends Controller {


	protected $view_namespace = 'BackEnd/Shipping::/';
	private $api_con_shipping;

    public function __construct(API_ShippingController $api_shipping_controller)
    {
        $this->api_con_shipping = $api_shipping_controller;
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
		$request->limit 	= 3;
		$request->offset 	= 0;
		
		$shipping_data = json_decode($this->api_con_shipping->getAllShippingWithLimitOffset($request), true);
		$shippings = array();

		if($shipping_data['code'] == 1){
			$shippings = $shipping_data["data"];
		}

		$data =  array(
				"shippings" 	=> $shippings['shipping'],
				"isLoadMore"	=> $shippings['isloadmore'],
				"currentDate"	=> $now
			);
		
		/*dd($data);*/
		return view($this->view_namespace."index")->with($data);
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
