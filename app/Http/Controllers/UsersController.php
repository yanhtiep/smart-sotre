<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Validator;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Validation\ValidatesRequests;
use App\Models\Users as Users;
class UsersController extends Controller
{
    public function __construct()
    {
        if(Auth::check())
        {
            view()->share('user',Auth::user());
        }
    }
    function getlogin(){
       
        return view("layouts.frontend.partials.login");
    }
    function postlogin(Request $request){
        
        $validator = Validator::make($request->all(),[
            'email'=>'required',
            'password'=>'required|min:5|max:32'
            
            ]);
        if($validator->fails()){
        	return back()->withErrors($validator)->withInput();
    	}
        if(Auth::attempt(['email'=>$request->email,'password'=>$request->password]))
        {
            return redirect("/");
        }else{
            return redirect()->back()->with(['flash_level' =>'Invalid username and password.']);
        }
      
    }
    function getlogout(){
    	Auth::logout();
    		return redirect("/");
   		}
   	function getuserinfo() {
     	return view("layouts.frontend.partials.user_info");
   	}
   function postuserinfo(Request $request){
        $validator = Validator::make($request->all(),[
            'username'=>'required|min:5',
            ]);
        if($validator->fails()){
        	return back()->withErrors($validator)->withInput();
    	}
         $user = Auth::user();
         $user->username = $request->username;
         if($request->changePassword == "on")
         {
            $this->validate($request,[
                'password' => 'required|min:5|max:32',
                'confpassword' => 'required|same:password'
            ]);
            if($validator->fails()){
	        	return back()->withErrors($validator)->withInput();
	    	}
            $user->password  = bcrypt($request->password);
         }
        $user->save();
        return redirect('/user-info')->with(['flash_level'=>'Success !! Complete Update']);
        
   }
   function getRegister(){
   		return view("layouts.frontend.partials.register");
   }
   function postRegister(Request $request){
  
    	$validator = Validator::make($request->all(),[
    			'username' => 'required|min:5',
    			'email' => 'required|email|unique:users,email',
                'password' => 'required|min:5|max:32',
                'confpassword' => 'required|same:password'
    	]);
    	if($validator->fails()){
       	 	return back()->withErrors($validator)->withInput();
    	}
		$user = new Users;
		$user->username = $request->username;
		$user->email = $request->email;
		$user->password = bcrypt($request->password);
		$user->save();

		return redirect('/user/register')->with(['flash_level'=>'Success !! Complete register.']);
  	}

}
