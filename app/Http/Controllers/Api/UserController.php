<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function users()
{
    $users = User::all()->map(function ($user) {
        $roles = $user->roles->pluck('name')->toArray();
        $roles_id = $user->roles->pluck('id')->toArray();

        return [
            'id' => $user->id,
            'name' => $user->name,
            'email' => $user->email,
            'roles' => $roles,
            'roles_id' => $roles_id,
        ];
    });

    return json_encode($users);
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

    return response()->json([
        'status' => 'success',
        'message' => 'User deleted successfully',
    ]);
}

public function getUser($id)
{
    $user = User::find($id);

    if(!$user){
        return response()->json([
            'status' => 'error',
            'message' => 'User not found',
        ], 404);
    }
    return json_encode($user);

}


}
