<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Repositories\EloquentRepositories\UserEloquentRepository as UserRepo;
use Tymon\JWTAuth\Exceptions\JWTException;
use JWTAuth;

class UserController extends Controller
{
    protected $user;

    public function __construct(User $user)
    {
        $this->user = new UserRepo($user);
    }

    public function getUserData(Request $request)
    {
        return response()->json(JWTAuth::toUser($request->token));
    }

    public function logout(Request $request)
    {
        return response()->json(JWTAuth::invalidate($request->token));
    }

}
