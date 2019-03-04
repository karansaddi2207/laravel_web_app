<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Laravel\Socialite\Facades\Socialite;
use App\User;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function redirectToProvider($service)
    {
        return Socialite::driver($service)->redirect();
    }

    /**
     * Obtain the user information from Facebook.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleProviderCallback($service)
    {
        if($service == 'facebook')
        {
            //for facebook
            $userSocial = Socialite::driver($service)->user();
        }
        else
        {
            //for google
            $userSocial = Socialite::driver($service)->stateless()->user();
        }

        // $user->token; User info
        $findUser = User::where('name',$userSocial->name)->first();
        if($findUser)
        {
            Auth::login($findUser);
            return redirect('/');
        }
        else
        {
            $user = new User;
            $user->name = $userSocial->name;
            $user->email = strlen($userSocial->email)>0 ? $userSocial->email : '';
            $user->password = bcrypt('ddddddd');
            $user->save();

            Auth::login($user);

            return redirect('/');
        }
    }

}
