<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class RolesPermissionsController extends Controller
{
    public function assignRole(Request $request)
    {

        $user = User::where('id', $request->user_id)->first();
        $role = Role::where('id', $request->role_id)->first();

        $user->syncRoles($role);

        return response()->json([
            'status' => 'success',
            'message' => 'Role assigned successfully',
        ]);
    }

    public function userRoles(Request $request)
    {
        $user = User::where('id', $request->user_id)->first();
        $roles = $user->roles->pluck('name') ?? [];

        return response()->json([
            'status' => 'success',
            'data' => $roles
        ]);
    }
}
