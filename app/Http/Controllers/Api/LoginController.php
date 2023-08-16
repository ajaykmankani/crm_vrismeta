<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest as Request;
use App\Http\Helpers\Helper;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\UserResource;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        //TODO login user
        if (!Auth::attempt($request->only('email', 'password'))) {
            Helper::sendError('Email or Password is incorrect');
        }
        return new UserResource(auth()->user());
        //TODO response
    }
}
