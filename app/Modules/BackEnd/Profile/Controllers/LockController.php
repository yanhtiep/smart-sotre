<?php namespace App\Modules\BackEnd\Profile\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Auth;
use App\Modules\BackEnd\Profile\Models\Users as Users;

class LockController extends Controller {

  protected $view_namespace = 'BackEnd\Profile';




  /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function index()
  {
    $id = Auth::user()->id;
    $user = Users::with('profile')->where('id',$id)->first();
    $datauser = array('dataProfile' => (object) ['id'=> $user->id, 'avatar'=> $user->profile->avatar, 'username'=> $user->username]);
    return view("BackEnd/Profile::lock")->with($datauser);
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
