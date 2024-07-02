<?php

namespace Database\Seeders;

use App\Models\Module;
use App\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissionsData = [
            [
                'module' => 'Admin Dashboard',
                'permissions' => [
                    ['name' => 'Access Dashboard', 'slug' => 'app.dashboard.access'],
                ],
            ],
            [
                'module' => 'Profile',
                'permissions' => [
                    ['name' => 'Update Profile', 'slug' => 'app.profile.update'],
                    ['name' => 'Update Password', 'slug' => 'app.profile.password'],
                ]
            ],
            [
                'module' => 'UserRole Management',
                'permissions' => [
                    ['name' => 'Access UserRole', 'slug' => 'app.roles.index'],
                    ['name' => 'Create UserRole', 'slug' => 'app.roles.create'],
                    ['name' => 'Edit UserRole', 'slug' => 'app.roles.edit'],
                    ['name' => 'Delete UserRole', 'slug' => 'app.roles.destroy'],
                ]
            ],
            [
                'module' => 'User Management',
                'permissions' => [
                    ['name' => 'Access User', 'slug' => 'app.users.index'],
                    ['name' => 'Create User', 'slug' => 'app.users.create'],
                    ['name' => 'Edit User', 'slug' => 'app.users.edit'],
                    ['name' => 'Delete User', 'slug' => 'app.users.destroy'],
                ]
            ]
        ];

        foreach ($permissionsData as $data) {
            $module = Module::updateOrCreate(['name' => $data['module']]);

            foreach ($data['permissions'] as $permission) {
                Permission::updateOrCreate([
                    'module_id' => $module->id,
                    'name' => $permission['name'],
                    'slug' => $permission['slug'],
                ]);
            }
        }
    }
}
