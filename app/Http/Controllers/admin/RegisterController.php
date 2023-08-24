<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest as Request;
use App\Http\Requests\AdminRegisterRequest as AdminRequest;
use App\Http\Helpers\Helper;

use App\Http\Resources\UserResource;
use Spatie\Permission\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Log;

class RegisterController extends Controller
{
    public function registerAction(Request $request)
    {
        //TODO register user
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        $user_role = Role::where(['name' => 'user'])->first();
        if ($user_role) {
            $user->assignRole($user_role);
        }

        return redirect()->route('user_list');
        //TODO response
    }

    public function register()
    {
        return view('admin.login_register.register');
    }
    public function userRegisterPage()
    {
        $roles = Role::all()->pluck('name', 'id');
        return view('admin.user.user_register', ['roles' => $roles]);
    }
    public function userRegister(AdminRequest $request)
    {
        //TODO register user
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => $request->role,
        ]);

        $user_role = $request->role;

        if ($user_role) {
            $user->assignRole($user_role);
        }

        return redirect()->route('user_list');
        //TODO response
    }

    public function update(AdminRequest $request)
    {
        $id = $request->id;

        $user = User::find($id);
        if ($user->email !== $request->email) {
            $existingUser = User::where('email', $request->email)->first();

            if ($existingUser) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'The email has already been taken.',
                ], 400);
            }

            $user->email = $request->email;
        }
        if (!$user) {
            return response()->json([
                'status' => 'error',
                'message' => 'User not found',
            ], 404);
        }

        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();

        // Update user's roles
        $user->roles()->sync([$request->role]);

        return response()->json([
            'status' => 'success',
            'message' => 'User updated',
            'data' => $user,
        ]);
    }




    public function roles()
    {
        $roles = Role::all()->pluck('name', 'id');

        return json_encode($roles);
    }
}
