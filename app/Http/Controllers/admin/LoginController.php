<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest as Request;
use App\Http\Helpers\Helper;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\UserResource;
use App\Events\LogActivity;
use Illuminate\Support\Facades\Response;

class LoginController extends Controller
{

    public function loginAction(Request $request)
    {
        //TODO login user
        if (!Auth::attempt($request->only('email', 'password'))) {
            return redirect()->route('login')->withErrors([
                'message' => 'Invalid credentials'
            ]);
        }
        $user = auth()->user();
        $activity = "logged in successfully.";
        event(new LogActivity($user, $activity));
        return redirect()->route('lead_list');
        //TODO response
    }
    public function login()
    {
        return view('admin.login_register.index');
    }

    public function login2()
    {
        return view('admin2.login');
    }

    public function logout()
    {
        $user = auth()->user();
        $activity = "logged out successfully.";
        event(new LogActivity($user, $activity));
        $response = app('Illuminate\Contracts\Routing\ResponseFactory')->make();
        if ($response->getStatusCode() == 419) {
            return redirect()->route('lead_list');
        } else {
            Auth::logout();
        }
        // Additional code if needed

        return redirect()->route('lead_list');
    }
}
