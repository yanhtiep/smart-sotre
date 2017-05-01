<?php namespace App\Modules\RESTfulAPI\Users\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Modules\RESTfulAPI\Users\Models\Users as Users;
use App\Modules\RESTfulAPI\Users\Models\Profile as Profile;
use App\Modules\RESTfulAPI\Users\Models\Social as Social;
use App\Modules\RESTfulAPI\Users\Models\Supercategories as Supercategories;




use App\Helpers\Utils as Utils;

class UsersController extends Controller {

	public function add(){
		/*--- check email if exist or not --*/

		if (Users::where('email', '=', $_POST['email'])->exists()) {
			return json_encode(Utils::response_error("This email is exist."));
		}
		else{

			$user = new Users;
			$user->username 	= $_POST['firstName'].$_POST['lastName'];
			$user->email 		= $_POST['email'];
			$user->password 	= bcrypt($_POST['password']);

			$user->role = (($_POST['role'] == "") ? 'customer':$_POST['role']);
			$user->save();
				 try {
			    $profile = new Profile;
					$profile->firstName = $_POST['firstName'];
					$profile->lastName =  $_POST['lastName'];
					$profile->dob = date("Y-m-d", strtotime($_POST['dob']));
					$profile->description =  $_POST['description'];
					$profile->telephone = $_POST['phone'];
					$profile->primaryHome = $_POST['address'];
					$profile->gender = $_POST['gender'];
					$profile->users()->associate($user);
					$profile->save();
					$profile = ['id' => $user->id, 'name' =>$user->username, 'email' => $user->email, 'phone' => $profile->telephone, 'role' => $user->role, 'social' => '', 'gender' => $profile->gender];
					return json_encode(Utils::response_success($profile));

				}catch(Exception $e){
					Users::destroy($user->id);
					return json_encode(Utils::response_error("Unable to create user."));
				}

		}
	}

	public function getAllUser(){

		$pros = Users::All();
		$allUser = [];
		foreach ($pros as $pro) {
				$allUser[] = ['id' => $pro->id,
									 'name' => $pro->username,
									 'phone' => $pro->profile['telephone'],
									 'role' => $pro->role,
									 'gender'=>$pro->profile['gender'],
									 'email' => $pro->email,
									 ];
		}
		return json_encode($allUser);
	}

	public function addUserSocial($provider,$username,$firstname,$lastname,$email,$avatar){
		if (Users::where('username', '=', $username )->exists()) {
			 return true;
		}else{
			$user = new Users;
			$user->username 	= $username;
			$user->email 		= $email;
			$user->role 		= 'customer';
			$user->save();

			//social login

			$social = new Social;
			$social->provider = $provider;
			$social->socialId = $username;
			$social->users()->associate($user);
			$social->save();

			try {
			    $profile = new Profile;
					$profile->firstName = $firstname;
					$profile->lastName =  $lastname;
					//$profile->dob =  date('y-m-d', strtotime($_POST['dob']));
					// $profile->description =  $_POST['description'];
					$profile->users()->associate($user);
					$profile->save();

					return json_encode(Utils::response_success($profile));

				}catch(Exception $e){
					Users::destroy($user->id);
					return json_encode(Utils::response_error("Unable to create user."));
				}
		}
		foreach ($whos as $who) {
			$who->profiles;
		}
		echo json_encode($whos);
	}

	/*
	*delete user
	*/
	public function deleteUser(Request $request){
		$id = $request->id;

		$delete = Users::find($id)->delete();
		if ($delete){
			return json_encode(Utils::response_success($delete));
		}else{
			return json_encode(Utils::response_error("Unable to delete user."));
		}
	}

	/*
	*edit user
	*
	*/
	public function editUserRole(Request $request){
		$id = $request->id;
		$role = $request->role;
		$u = Users::find($id);
		//$datauser->role = $role;
		if ($u){
			$supcatu =  array();
			$datas = array();
			$supcatu['id'] = $u->id;
			$supcatu['firstName'] = $u->profile->firstName;
			$supcatu['lastName'] = $u->profile->lastName;
			$supcatu['dob'] = $u->profile->dob;
			$supcatu['email'] = $u->email;
			$supcatu['gender'] = $u->profile->gender;
			$supcatu['phone'] = $u->profile->telephone;
			$supcatu['address'] = $u->profile->primaryHome;
			$supcatu['role'] = $u->role;
			$supcatu['description'] = $u->profile->description;
			return json_encode(Utils::response_success($supcatu));
		}else{
			return json_encode(Utils::response_error("Unable to update role user."));
		}
	}

	/*
	*update user
	*/
	public function updateUserRole(Request $request){
		$id = $request->updateuser;
		$role = $request->role;
		$user = Users::find($id);
		$user->role = $role;
		if ($user->save()){
			return json_encode(Utils::response_success($user));
		}else{
			return json_encode(Utils::response_error("Unable to update role user."));
		}
	}

	/*
	*confirm code
	*/
	public function comfirmCode(Request $request){
		$code = $request->code;
		$user = Users::where('confirmCode',$code)->first();
		if ($user){
			return json_encode(Utils::response_success($user));
		}else{
			return json_encode(Utils::response_error("Your code is incorrect"));
		}
	}

	/*
	* change password
	*/
	public function changePassword(Request $request){
		$id = $request->id;
		$new_pass = $request->password;
		$user = Users::find($id);
		if ($user){
		 		$user->password = bcrypt($new_pass);
		 		$user->save();

		 		return json_encode(Utils::response_success($user));
		}else{

		 	return json_encode(Utils::response_error("Fial update pass"));
		}
	}
	/*
	*get user limit
	*
	*/
	public function getUserWithLimitOffset(Request $request){
		$datas	= array();
		$data 	= array();
		try{
			$response = array();
			$users = Users::where("created_at","<=",$request->currentDate)->orderBy('created_at', 'desc')->limit($request->limit)->offset($request->offset)->get();
			$num_user_count_from_date = Users::where("created_at","<=",$request->currentDate)->count();
			foreach ($users as $user) {

				$data = $user;
				if ($user->profile !=""){
					$data ['gender'] = $user->profile->gender;
					$data ['phone'] = $user->profile->telephone;
					$data ['name'] = $user->profile->firstName.$user->profile->lastName;
				}else{
					$data ['gender'] = '';
					$data ['phone'] = '';
					$data ['name'] = $user->username;
				}

				if (count($user->socialLogin) > 0){
					 $data['social'] = $user->socialLogin[0]->provider;
				}else{
					$data['social'] = '';
				}

				unset($data['profile']);
				unset($data['socialLogin']);
				array_push($datas, $data);
			}
			$response["users"] = $datas;
			if(($num_user_count_from_date - ($request->limit + $request->offset)) <= 0) $response["isloadmore"] = 0;
			else $response["isloadmore"] = 1;
			return json_encode(Utils::response_success($response));
		}catch(Exception $e){
			return json_encode(Utils::response_error($e));
		}
	}


	/*
	*pull auto refress
	*/
	public function pullToRefresh(Request $request){
		$datas	= array();
		$data 	= array();
		try{
			//prepare to respond
			$response = array("currentDate" => $request->currentDate);
			$lastestDate = "";
			//
			$users = Users::where("created_at",">",$request->currentDate)->orderBy('created_at', 'desc')->get();
			foreach ($users as $user) {
				//lastest date of datas
				if($lastestDate == ""){
					$lastestDate = $user["created_at"];
					//"$lastestDate" prevent default data of laravel which not string, also known as covert
					$response["currentDate"] = "$lastestDate";
					$data = $user;
					$data ['gender'] = $user->profile->gender;
					$data ['phone'] = $user->profile->telephone;
					$data ['name'] = $user->profile->firstName.$user->profile->lastName;

					if (count($user->socialLogin) > 0){
						 $data['social'] = $user->socialLogin[0]->provider;
					}else{
						$data['social'] = '';
					}

					unset($data['profile']);
					unset($data['socialLogin']);
					array_push($datas, $data);
				}

			}
			$response["users"] = $datas;
			return json_encode(Utils::response_success($response));
		}catch(Exception $e){
			return json_encode(Utils::response_error($e));
		}
	}

	public function register(Request $request){
  
    $user = new users;
    $user->username = $request->username;
    $user->email = $request->email;
    $user->password = bcrypt($request->password);
    $user->created_at = date('Y-m-d H:i:s');
	   try {
	   	$user->save();
	   	return json_encode(Utils::response_success($user));
	   } catch (Exception $e) {
	   	return json_encode(Utils::response_error($e));
	   }
  }

  public function getprofileuser(Request $request){
  	$id = $request->id;
  	$datas = array();
  	try {
  			$user = users::find($id);
  			$dp = Profile::with("users")->where('users_id','=',$id)->get();
		  	if ($user !=""){
		  			$datas['username'] = $user->username;
		  			$datas['avatar'] = $dp[0]->avatar;
		  		return json_encode(Utils::response_success($datas));
		  	}
  	} catch (Exception $e) {
  		return json_encode(Utils::response_error($e));
  	}
  }
	

	public function getUserWithLimitOffsetUpdate(Request $request){
		$datas	= array();
		$data 	= array();
		try{
			$response = array();
			$users = Users::where("created_at","<=",$request->currentDate)->orderBy('created_at', 'desc')->limit($request->limit)->offset($request->offset)->get();
			$num_user_count_from_date = Users::where("created_at","<=",$request->currentDate)->count();
			foreach ($users as $user) {

				$data = $user;
				if ($user->profile !=""){
					$data ['gender'] = $user->profile->gender;
					$data ['phone'] = $user->profile->telephone;
					$data ['name'] = $user->profile->firstName.$user->profile->lastName;
				}else{
					$data ['gender'] = '';
					$data ['phone'] = '';
					$data ['name'] = $user->username;
				}

				if (count($user->socialLogin) > 0){
					 $data['social'] = $user->socialLogin[0]->provider;
				}else{
					$data['social'] = '';
				}

				unset($data['profile']);
				unset($data['socialLogin']);
				array_push($datas, $data);
			}
			$response["users"] = $datas;
			if(($num_user_count_from_date - ($request->limit + $request->offset)) <= 0) $response["isloadmore"] = 0;
			else $response["isloadmore"] = 1;
			return json_encode(Utils::response_success($response));
		}catch(Exception $e){
			return json_encode(Utils::response_error($e));
		}
	}
}
