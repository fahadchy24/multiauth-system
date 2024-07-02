<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $superAdminRole = Role::where('slug', 'super-admin')->first();
        User::updateOrCreate([
            'role_id' => $superAdminRole->id,
            'name' => 'Super Admin',
            'email' => 'superadmin@superadmin.com',
            'password' => Hash::make('password'),
        ]);

        $adminRole = Role::where('slug', 'admin')->first();
        User::updateOrCreate([
            'role_id' => $adminRole->id,
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => Hash::make('password'),
        ]);

        $userRole = Role::where('slug', 'user')->first();
        User::updateOrCreate([
            'role_id' => $userRole->id,
            'name' => 'John Doe',
            'email' => 'user@user.com',
            'password' => Hash::make('password'),
        ]);
    }
}
