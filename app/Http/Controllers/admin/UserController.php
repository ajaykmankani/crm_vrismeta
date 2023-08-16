<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class UserController extends Controller
{
    public function users()
    {
        $users = User::orderBy('created_at', 'desc')->get();;
        return view('admin.user.user_list', ['users' => $users]);
    }

    public function destroy(Request $request)
    {
        $user = User::find($request->user_id);

        if (!$user) {
            return response()->json([
                'status' => 'error',
                'message' => 'User not found',
            ], 404);
        }

        $user->delete();
        $user = auth()->user();

        return redirect()->route('user_list');
    }

    public function getUser($id)
    {
        $user = User::find($id);

        if (!$user) {
            return response()->json([
                'status' => 'error',
                'message' => 'User not found',
            ], 404);
        }
        return json_encode($user);
    }

    public function edit(Request $request)
    {
        $user_id = $request->user_id;
        $user = User::find($user_id);
        $roles = Role::all()->pluck('name', 'id');
        return view('admin.user.user_edit', ['user' => $user, 'roles' => $roles]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {

        $user_id = $request->user_id;
        $user = user::find($user_id);

        $user->name = $request->name;
        $user->email = $request->email;

        if (!$request->password == null) {
            $user->password = bcrypt($request->password);
        }

        if ($request->role_id) {
            $newRole = Role::findById($request->role_id);

            $user->syncRoles([$newRole]);
        }
        $user->save();

        return redirect()->route('user_list');
    }

    public function destroy_multiple(Request $request)
    {

        foreach ($request->users as $user_id) {

            $user = user::find($user_id);

            if ($user) {
                $user->delete();
            }
        }
        return redirect()->back()->with('success', 'user deleted.');
    }
}
