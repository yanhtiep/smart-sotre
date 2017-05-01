<?php namespace App\Modules\RESTfulAPI\Profile\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Http\Request;
use App\Modules\RESTfulAPI\Profile\Models\Social as Social;
use App\Modules\RESTfulAPI\Profile\Models\Users as Users;
use App\Modules\RESTfulAPI\Profile\Models\Profile as Profile;
use App\Helpers\Utils as Utils;
require 'Mymail.php';
use Carbon;
class ProfileController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return view("RESTfulAPI\Profile::index");
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
	public function show()
	{
		$id =Auth::user()->id;
		$user =Users::with('profile')->where('id',$id)->first();
		$dob = date('d-M-Y', strtotime($user->profile->dob));
		$userData = ['id'=> $user->id,
							 'username' => $user->username,
							 'email' => $user->email,
							 'role' => $user->role,
							 'firstName' => $user->profile->firstName,
							 'lastName' => $user->profile->lastName,
							 'gender' => $user->profile->gender,
							 'avatar' => $user->profile->avatar,
							 'address' => $user->profile->primaryHome,
							 'description' => $user->profile->description,
							 'dob' => $dob,
							 'phone' => $user->profile->telephone,
							 'facebook' => $user->profile->facebook,
							 'google' => $user->profile->google,
							 'twitter' => $user->profile->twitter,
							 'linkedin' => $user->profile->linkedin
							 ];
		return json_encode($userData);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit(Request $request)
	{

		$id =$request->id;
		$user = Users::with('profile')->where('id',$id)->first();
		$dob = date('d-M-Y', strtotime($user->profile->dob));
		$userData = ['id'=> $user->id,
							 'username' => $user->username,
							 'email' => $user->email,
							 'role' => $user->role,
							 'firstName' => $user->profile->firstName,
							 'lastName' => $user->profile->lastName,
							 'gender' =>$user->profile->gender,
							 'avatar' =>$user->profile->avatar,
							 'address' =>$user->profile->primaryHome,
							 'description' =>$user->profile->description,
							 'dob' =>   $dob,
							 'phone' =>$user->profile->telephone,
							 'facebook' => $user->profile->facebook,
							 'google' => $user->profile->google,
							 'twitter' => $user->profile->twitter,
							 'linkedin' => $user->profile->linkedin
							 ];
		if ($userData){
			return json_encode(Utils::response_success($userData));
		}else{
			return json_encode(Utils::response_error("Unable to update profile user."));
		}
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(Request $request)
	{
		$username = $request->username;
		$firstname = $request->firstname;
		$lastname = $request->lastname;
		$email = $request->email_user;
		$dob = $request->dob;
		$phone = $request->phone;
		$address = $request->address;
		$facebook = $request->facebook;
		$google = $request->google;
		$twitter = $request->twitter;
		$linkedin = $request->linkedin;
		$gender = $request->gender;
		$img = $_FILES['fileImage'];
		$id = $request->userId;
		//return json_encode($id);
		if($img["name"] != ""){
		   $newImg = Utils::upload_single_image("assets/uploads/profile",$img);
		   if($newImg['code'] == 0){
		    //Invalid file type or size
		    return json_encode($newImg);
		   }
		  $newImg['data'];
 		 }

		$user =Users::where('id',$id)->first();
		$user->username = $username;
		$user->email = $email;
		$user->save();

		$profile =Profile::where('users_id',$id)->first();

		$profile->firstName = $firstname;
		$profile->lastName = $lastname;
		$profile->gender = $gender;
		$profile->facebook = $facebook;
		$profile->google = $google;
		$profile->twitter = $twitter;
		$profile->linkedin = $linkedin;
		$profile->primaryHome = $address;
		$profile->dob = $dob;

		if($img["name"] != ""){
		  	$profile->avatar = $newImg['data'];

 		 }

		$profile->telephone = $phone;

		$userprofile = $profile->save();

		if ($userprofile){
			return json_encode(Utils::response_success($userprofile));
		}else{
			return json_encode(Utils::response_error("Unable to update profile user."));
		}
	}

	/**
  *send email
  */
  public function sendEmailReminder(Request $request)
    {
        $useremail =$request->email;
        $user = new users;
        $user = users::where('email',$useremail)-> first();
	        if ($user){
	          $code = $this->quickRandom();
	          $email = $user->email;
	          $name = $user->username;
	          $subject = 'Code reset password';
	          $body = 'Your code <br>'.$code;
	          $sendemail = send_helper($email ,$name, $subject, $body);
			       if ($user){
				       	$user->confirmCode =  $code;
				        $user->save();
								return json_encode(Utils::response_success($user));
							}else{
								return json_encode(Utils::response_error("Unable to update profile user."));
							}
	    }
         		
  }

  /*
  * create new password
  */

  public static function quickRandom($length = 6)
  {
      $pool = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';

      return substr(str_shuffle(str_repeat($pool, 5)), 0, $length);
  }
}
