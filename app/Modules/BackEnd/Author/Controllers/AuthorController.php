<?php
namespace App\Modules\BackEnd\Author\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;
use Validator;
use Illuminate\Http\Request;
use App\Modules\BackEnd\Author\Models\Author as users;
use Socialite;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use App\Modules\RESTfulAPI\Users\Controllers\UsersController as API_Controller;
use Session;
require 'Mymail.php';
class AuthorController extends Controller {

  protected $view_namespace = 'BackEnd/Author';
  private $login_social;

  public function __construct(API_Controller $addUserBySocail)
  {
    $this->login_social = $addUserBySocail;
  }

/**
 * Show the form for login a new resource.
 *
 * @return Response
 */
	public function login( Request $request)
	{
    
    if(!$request->isMethod('post')){
        return view('BackEnd/Author::login');
    }
    $validator = Validator::make($request->all(), [
        'username' => 'required|max:255',
        'password' => 'required|max:255',
        'remember' => 'boolean',
    ]);

    if($validator->fails()){
        return back()->withErrors($validator)->withInput();
    }

    $username = $request->input('username');
    $password = $request->input('password');
    $remember = $request->input('remember');

    if(Auth::attempt(['username' => $username, 'password' => $password, 'deleted_at' => null], $remember)){
        // Authentication
      return redirect()->intended('/admin');
    }

    return back()->withErrors($validator)->withInput()->with('msg', 'Invalid username and password.');


	}

  /*
   *login with facebook
   *
   */
  public function redirect()
  {
      return Socialite::driver('facebook')->redirect();
  }

  public function callback()
  {
      $user= Socialite::driver('facebook')->user();
      $username = $user->id;
      $email = $user->user['email'];
      $avatar = $user->avatar;
      $provider = 'facebook';
      $firstName = $user->name;
      $lastName = '';
      $addUser = $this->login_social->addUserSocial($provider,$username,$firstName,$lastName,$email,$avatar);
      return redirect()->intended('/admin');

  }

	public function register(){
    return view('BackEnd/Author::register');
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return Response
   */
  public function create(Request $request){

    $validator = $this->validation($request);

    if ($validator->fails()) {
        return back()
            ->withErrors($validator)
            ->withInput();
    }

    $user = new users;
    $user->username = $request->input('username');
    $user->email = $request->input('email');
    $user->password = bcrypt($request->input('password'));
    $user->created_at = date('Y-m-d H:i:s');
    if($user->save()){
        $request->session()->flash('msg', 'User successfully created.');

        return redirect()->route('admin.Index.admin');
    }
    return back()->withInput()->with(['msg_status' => 'danger', 'msg' => 'Unable to create user, please try again.']);

  }


  /**
   * Store a newly created new password in storage.
   *
   * @return Response
   */
  public  function resetPassword(Request $request){
      return view('BackEnd/Author::forgot-password');
  }


  /**
  *send email
  */
  public function sendEmailReminder(Request $request)
    {
        $useremail =$request->input('email');
        //dd($useremail);
        $user = new users;
        $user = users::where('email',$useremail) -> first();

        if ($user){
          $request->session()->flash('msg', 'Please modify your code');
          $code = $this->quickRandom();
          $email = $user->email;
          $name = $user->username;
          $subject = 'Code reset password';
          $body = 'Your code <br>'.$code;
          $sendemail = send_helper($email ,$name, $subject, $body);
          if ($sendemail){
             $user->confirmCode =  $code;
             $user->save();
             return redirect()->route('admin.confirm');
           }else{
            return back()->withInput()->with(['msg_status' => 'danger', 'msg' => 'Your email incorret!']);
           }
        }else{
          //echo "error";
          return back()->withInput()->with(['msg_status' => 'danger', 'msg' => 'Your email incorret!']);
        }

        // return $user;

    }

  /*
  * create new password
  */

  public static function quickRandom($length = 6)
  {
      $pool = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';

      return substr(str_shuffle(str_repeat($pool, 5)), 0, $length);
  }

  /*
  *return view confirm code
  */

  public function confirmCode(){
      return view('BackEnd/Author::confirm');
  }

  /*
  * return view change password
  */

  public function changePassword(){
      return view('BackEnd/Author::new-password');
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

/*
 * validation user register
 */
  public function validation($request)
  {
      $rules = array(
          'username' => 'required|max:255',
          'email' => 'required|unique:users',
          'password' => 'required|min:5',
          'con_password' => 'required_with:password|same:password'

      );

      if($request->route('id', false)){
          $rules['email'] = 'max:208';
          $rules['password']   = 'max:25';
          $rules['con_password']   = 'max:25';

      }

      return Validator::make($request->all(), $rules);
  }

  /*
   * login function
   * create by sonvisal
   * position backend developer
   */
  public function logout()
  {
      Auth::logout();
      return redirect()->route('admin.login');
  }
}
