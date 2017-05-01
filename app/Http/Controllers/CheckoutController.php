<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Validation\ValidatesRequests;
class CheckoutController extends Controller
{
	public function __construct()
    {
        if(Auth::check())
        {
            view()->share('user',Auth::user());
        }
    }

   function index(){
    	// check for user login
   		if(Auth::check()){
   			return view("layouts.frontend.partials.checkout");
   		}else{
   			return redirect('/user/login');
   		}	
    }
    function formvalidate(Request $request){
        
        $validator = Validator::make($request->all(),[
            'firstname'=>'required|min:5|max:32',
            'lastname'=>'required|min:5|max:32',
            'email' => 'required|email|unique:users,email',
            'phone' => 'required|min:9|max:20',
            'address' => 'required|min:5|max:20',
            'postcode' => 'required|min:3|max:20',
            'town' => 'required|min:5|max:20',
            'contry' => 'required'
            ]);
        if($validator->fails()){
            return back()->withErrors($validator)->withInput();
        }
        dd('done');
    }
   
}
