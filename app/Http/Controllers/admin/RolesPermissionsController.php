<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

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

    public function create_role()
    {
        $user = User::all()->pluck('name', 'id');
        $roles = Role::all()->pluck('name', 'id');
        $permissions = Permission::all()->pluck('name', 'id');
        return view('admin.roleAndPermission.create_role', ['roles' => $roles, 'permissions' => $permissions, 'users' => $user]);
    }

    public function store_role(Request $request)
    {
        $role = $request->name;
        Role::create(['name' => $role]);
        $roles = Role::all()->pluck('name', 'id');
        $permissions = Permission::all()->pluck('name', 'id');
        return view('admin.roleAndPermission.create_role', ['roles' => $roles, 'permissions' => $permissions]);
    }

    public function store_permissions(Request $request)
    {
        $permission = $request->name;
        Permission::create(['name' => $permission]);
        $roles = Role::all()->pluck('name', 'id');
        $permissions = Permission::all()->pluck('name', 'id');
        return view('admin.roleAndPermission.create_role', ['roles' => $roles, 'permissions' => $permissions]);
    }

    public function distroy_role($id)
    {
        $roleid = Role::all()->where('id', $id)->pluck('name');;
        // dd($roleid);
        $role = Role::where('name', $roleid)->first();
        if ($role) {
            $role->delete();
            $roles = Role::all()->pluck('name', 'id');
            return view('admin.create_role', ['roles' => $roles]);
        } else {
            $roles = Role::all()->pluck('name', 'id');
            return view('admin.roleAndPermission.create_role', ['roles' => $roles])->with(['error' => 'Some Error Occured']);
        }
    }

    public function distroy_permission($id)
    {
        $permissionid = Permission::all()->where('id', $id)->pluck('name');;
        // dd($roleid);
        $permission = Permission::where('name', $permissionid)->first();
        if ($permission) {
            $permission->delete();
            $roles = Role::all()->pluck('name', 'id');
            $permissions = Permission::all()->pluck('name', 'id');
            return view('admin.roleAndPermission.create_role', ['roles' => $roles, 'permissions' => $permissions]);
        } else {
            $roles = Role::all()->pluck('name', 'id');
            $permissions = Permission::all()->pluck('name', 'id');
            return view('admin.roleAndPermission.create_role', ['roles' => $roles, 'permissions' => $permissions]);
        }
    }

    public function assign_permission(Request $request)
    {

        $role = Role::where('id', $request->role_id)->first();
        $permission = Permission::where('id', $request->permission_id)->first();

        $role->givePermissionTo($permission);

        $roles = Role::all()->pluck('name', 'id');
        $permissions = Permission::all()->pluck('name', 'id');
        return view('admin.roleAndPermission.check_role_permission', ['roles' => $roles, 'role' => null, 'role_permissions' => ['Select Role'], 'permissions' => $permissions]);
    }

    public function check_role_permission()
    {
        $permissions = Permission::all()->pluck('name', 'id');
        $roles = Role::all()->pluck('name', 'id');

        return view('admin.roleAndPermission.check_role_permission', ['roles' => $roles, 'role' => null,  'role_permissions' => ['Select Role'], 'permissions' => $permissions]);
    }

    public function check_role_permission_post(Request $request)
    {
        $role = Role::where('id', $request->role_id)->first();
        $role_permissions = $role->permissions->pluck('name', 'id');
        $permissions = Permission::all()->pluck('name', 'id');


        $roles = Role::all()->pluck('name', 'id');

        return view('admin.roleAndPermission.check_role_permission', ['roles' => $roles, 'role' => $role, 'role_permissions' => $role_permissions, 'permissions' => $permissions]);
    }

    public function revoke_permission(Request $request)
    {
        $role = Role::find($request->role_id);
        $permission = Permission::find($request->permission_id);

        $role->revokePermissionTo($permission);

        $role_permissions = $role->permissions->pluck('name', 'id');
        $permissions = Permission::all()->pluck('name', 'id');


        $roles = Role::all()->pluck('name', 'id');

        return view('admin.roleAndPermission.check_role_permission', ['roles' => $roles, 'role' => $role, 'role_permissions' => $role_permissions, 'permissions' => $permissions]);
    }
}
