<?php
/**
 * Created by PhpStorm.
 * User: sonvisal
 * Date: 14/10/2016
 * Time: 07:38
 */
namespace App\Modules\BackEnd\Author\Controllers;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;
use Validator;
use Illuminate\Http\Request;
use App\Modules\BackEnd\Author\Models\Author as users;
use App\SocialAccountService;
use Socialite;
use App\Modules\RESTfulAPI\Users\Controllers\UsersController as API_Controller;

class LinkedinController extends Controller {
     private $login_social;
     public function __construct(API_Controller $addUserBySocail)
    {
        $this->login_social = $addUserBySocail;
    }
    /**
     * login with twitter
     */
    /**
     * Redirect the user to the Twitter authentication page.
     *
     * @return Response
     */
    public function redirectToProvider()
    {
        return Socialite::driver('linkedin')->redirect();
    }

    /**
     * Obtain the user information from Twitter.
     *
     * @return Response
     */
    public function handleProviderCallback()
    {
        $user = Socialite::driver('linkedin')->user();
        // dd($user);
        $email = $user->email;
        $firstName = $user->user['firstName'];
        $username = $user->user['id'];
        $lastName = $user->user['lastName'];
        $provider = 'linkedin';
        $avatar = $user->user['pictureUrl'];
        $addUser = $this->login_social->addUserSocial($provider,$username,$firstName,$lastName,$email,$avatar);
        return redirect()->intended('/admin');
    }

}