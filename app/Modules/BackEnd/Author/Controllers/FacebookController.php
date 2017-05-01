<?php
/**
 * Created by PhpStorm.
 * User: sonvisal
 * Date: 14/10/2016
 * Time: 08:08
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

class FacebookController extends Controller {

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
        return Socialite::driver('facebook')->redirect();
    }

    /**
     * Obtain the user information from Twitter.
     *
     * @return Response
     */
    public function handleProviderCallback()
    {
        $user = Socialite::driver('facebook')->user();
        dd($user);
    }

}