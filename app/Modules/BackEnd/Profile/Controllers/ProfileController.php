<?php namespace App\Modules\BackEnd\Profile\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Modules\RESTfulAPI\Profile\Controllers\ProfileController as API_Controller;

class ProfileController extends Controller {

	protected $view_namespace = 'BackEnd\Profile';


	 private $profileData;

  public function __construct(API_Controller $editProfile)
  {
    $this->profileData = $editProfile;
  }

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$userData =json_decode($this->profileData->show(),true);
		$data = array('dataProfile' => (object)$userData);
		return view("BackEnd/Profile::profile")->with($data);
		
	}

	/*
	* return view edit profile
	*
	*/

	public function formEdit($id)

	{
		$profile = json_decode($this->profileData->edit($id),true);
		$data = array('dataProfileEdie' => (object)$profile);

		return view("BackEnd/Profile::edit")->with($data);
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
