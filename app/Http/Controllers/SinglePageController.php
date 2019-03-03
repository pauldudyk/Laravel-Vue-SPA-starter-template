<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Repositories\EloquentRepositories\UserEloquentRepository as UserRepo;
use Tymon\JWTAuth\Exceptions\JWTException;
use JWTAuth;
use Socialite;
use Exception;
use Auth;

class SinglePageController extends Controller
{
    protected $user;

    public function __construct(User $user)
    {
        $this->user = new UserRepo($user);
    }
    public function index()
    {
        return view('app');
    }

    public function facebookAuthRedirect(Request $request)
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function facebookAuthResponse(Request $request)
    {
        $facebookUser = Socialite::driver('facebook')->user();

        $localUser = $this->user->findByEmailAndFacebookId($facebookUser->getEmail(), $facebookUser->getId());

        if($localUser)
        {
            $token = JWTAuth::fromUser($localUser);
        }
        else
        {
            $newUser = $this->user->create(['facebook_id' => $facebookUser->getId(), 'name' => $facebookUser->getName(), 'email' => $facebookUser->getEmail()]);
            $token = JWTAuth::fromUser($newUser);
        }
        return redirect('/?code='.$token);
    }
}
