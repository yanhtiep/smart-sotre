<?php

namespace App\Modules\BackEnd\Users\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Modules\RESTfulAPI\Users\Controllers\UsersController as API_UsersController;
use Carbon\Carbon;

class UsersController extends Controller {

	protected $view_namespace = 'BackEnd/Users';
	private $some_service;

    public function __construct(API_UsersController $api_user_controller)
    {
        $this->some_service = $api_user_controller;
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

		$dataUsers = json_decode($this->some_service->getUserWithLimitOffset($request),true);
		$users = array();
		if($dataUsers['code'] == 1){
			$users = $dataUsers["data"];
		}

		$data =  array(
				"users" 	=> $users['users'],
				"isLoadMore"	=> $users['isloadmore'],
				"currentDate"	=> $now
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
		$this->some_service->deleteUser($id);
	}

}
