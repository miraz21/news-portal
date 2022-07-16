<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

use App\Models\Admin;

use App\Models\Social;

use App\Models\Theme;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::create([
            'name' => 'Admin',
            'email' => 'shaifulbd123@gmail.com',
            'phone' => '0167008888',
            'address' => 'Dhaka',
            'password' => Hash::make('shaifulbd123@gmail.com'),
        ]);
        $user = User::create([
            'name' => 'User',
            'email' => 'user@gmail.com',
            'phone' => '0167008888',
            'address' => 'Dhaka',
            'password' => Hash::make('user@gmail.com'),
        ]);


        Role::create(['name' => 'admin']);
        Role::create(['name' => 'user']);
        Role::create(['name' => 'author']);
        Role::create(['name' => 'editor']);
        Role::create(['name' => 'publisher']);
        Role::create(['name' => 'contributor']);
        Role::create(['name' => 'subscriber']);
        Role::create(['name' => 'moderator']);
        Role::create(['name' => 'administrator']);
        Role::create(['name' => 'owner']);
        Role::create(['name' => 'member']);
        Role::create(['name' => 'client']);
        Role::create(['name' => 'vendor']);
        Role::create(['name' => 'employee']);
        Role::create(['name' => 'customer']);
        Role::create(['name' => 'supplier']);

        $admin->syncRoles('admin');
        $user->assignRole('user');

        Theme::insert([
            'site_title' => "Our News Portal"
        ]);

        Social::insert([
            'facebook' => ''
        ]);
    }
}
