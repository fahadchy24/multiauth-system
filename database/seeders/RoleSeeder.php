<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $super_admin_permissions = Permission::all();
        Role::updateOrCreate(['name' => 'Super Admin', 'slug' => 'super-admin', 'is_deletable' => false])
            ->permissions()
            ->sync($super_admin_permissions->pluck('id'));

        $admin_permissions = Permission::all();
        Role::updateOrCreate(['name' => 'Admin', 'slug' => 'admin', 'is_deletable' => false])
            ->permissions()
            ->sync($admin_permissions->pluck('id'));

        Role::updateOrCreate(['name' => 'User', 'slug' => 'user', 'is_deletable' => false]);
    }
}
