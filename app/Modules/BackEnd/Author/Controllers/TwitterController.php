<?php
/**
 * Created by PhpStorm.
 * User: sonvisal
 * Date: 14/10/2016
 * Time: 04:44
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
class TwitterController extends Controller {

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
        return Socialite::driver('twitter')->redirect();
    }

  /**
   * Obtain the user information from Twitter.
   *
   * @return Response
   */
  public function handleProviderCallback()
  {
    $user = Socialite::driver('twitter')->user();
    $lastName = $user->nickname;
    $username = $user->id;
    $firstName = $user->name;
    $avatar = $user->avatar;
    $email = $user->email;
    $provider = 'twitter';
    $addUser = $this->login_social->addUserSocial($provider,$username,$firstName,$lastName,$email,$avatar);
    return redirect()->intended('/admin');

  }

}