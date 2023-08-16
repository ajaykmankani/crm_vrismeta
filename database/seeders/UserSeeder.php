<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\User;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // creating permissions
        // user permissions
        $user_listing = Permission::create(['name' => 'user.listing']);
        $user_view = Permission::create(['name' => 'user.view']);
        $user_create = Permission::create(['name' => 'user.create']);
        $user_update = Permission::create(['name' => 'user.update']);
        $user_delete = Permission::create(['name' => 'user.delete']);
        // lead permissions
        $lead_listing = Permission::create(['name' => 'lead.listing']);
        $lead_view = Permission::create(['name' => 'lead.view']);
        $lead_create = Permission::create(['name' => 'lead.create']);
        $lead_update = Permission::create(['name' => 'lead.update']);
        $lead_delete = Permission::create(['name' => 'lead.delete']);

        // sale permissions
        $sale_listing = Permission::create(['name' => 'sale.listing']);
        $sale_view = Permission::create(['name' => 'sale.view']);
        $sale_create = Permission::create(['name' => 'sale.create']);
        $sale_update = Permission::create(['name' => 'sale.update']);
        $sale_delete = Permission::create(['name' => 'sale.delete']);

        // role permissions
        $role_listing = Permission::create(['name' => 'role.listing']);
        $role_view = Permission::create(['name' => 'role.view']);
        $role_create = Permission::create(['name' => 'role.create']);
        $role_update = Permission::create(['name' => 'role.update']);
        $role_delete = Permission::create(['name' => 'role.delete']);
        // permission permissions
        $permission_listing = Permission::create(['name' => 'permission.listing']);
        $permission_view = Permission::create(['name' => 'permission.view']);
        $permission_create = Permission::create(['name' => 'permission.create']);
        $permission_update = Permission::create(['name' => 'permission.update']);
        $permission_delete = Permission::create(['name' => 'permission.delete']);
// creating role
        $admin_role = Role::create(['name' => 'admin']);
        $user_role = Role::create(['name' => 'user']);

// giving permission to role
        $admin_role->givePermissionTo([
            $user_listing,
            $user_view,
            $user_create,
            $user_update,
            $user_delete,
            $lead_listing,
            $lead_view,
            $lead_create,
            $lead_update,
            $lead_delete,
            $sale_listing,
            $sale_view,
            $sale_create,
            $sale_update,
            $sale_delete
        ]);

        $user_role->givePermissionTo([
            $user_listing,
            $user_view,
            $lead_listing,
            $lead_view,
            $lead_create,
            $lead_update,
            $sale_listing,
            $sale_view,
            $sale_create,
            $sale_update,
        ]);

        // creating user

        $admin = User::create([
            'name' => 'Administrator',
            'email' => 'admin@admin.com',
            'password' => bcrypt('password'),
        ]);

        $user = User::create([
            'name' => 'User',
            'email' => 'user@user.com',
            'password' => bcrypt('password'),
        ]);


        // assign role to user

        $admin->assignRole($admin_role);

        $user->assignRole($user_role);
    }
}
