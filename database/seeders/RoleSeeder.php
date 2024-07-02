<?php

namespace Database\Seeders;

use App\Enums\UserRole;
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
        Role::updateOrCreate(['name' => UserRole::SUPERADMIN->toLabel(), 'slug' => UserRole::SUPERADMIN->toSlug(), 'is_deletable' => false])
            ->permissions()
            ->sync($super_admin_permissions->pluck('id'));

        $admin_permissions = Permission::all();
        Role::updateOrCreate(['name' => UserRole::ADMIN->toLabel(), 'slug' => UserRole::ADMIN->toSlug(), 'is_deletable' => false])
            ->permissions()
            ->sync($admin_permissions->pluck('id'));

        Role::updateOrCreate(['name' => UserRole::USER->toLabel(), 'slug' => UserRole::USER->toSlug(), 'is_deletable' => false]);
    }
}
