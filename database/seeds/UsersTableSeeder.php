<?php

use App\Role;
use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        DB::table('role_user')->truncate();

        $adminRole = Role::where('name', 'admin')->first();
        $managerRole = Role::where('name', 'manager')->first();
        $userRole = Role::where('name', 'user')->first();

        $password = Hash::make('password');

        $admin = User::create([
            'name' => 'Admin User',
            'email' => 'admin@admin.com',
            'password' => $password
        ]);

        $manager = User::create([
            'name' => 'Manager User',
            'email' => 'manager@admin.com',
            'password' => $password
        ]);

        $user = User::create([
            'name' => 'User',
            'email' => 'user@admin.com',
            'password' => $password
        ]);

        $admin->roles()->attach($adminRole);
        $manager->roles()->attach($managerRole);
        $user->roles()->attach($userRole);



    }
}
