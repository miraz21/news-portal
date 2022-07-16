<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

use App\Models\Admin;

use App\Models\Social;

use App\Models\Theme;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::insert([
            'name' => 'Admin',
            'email' => 'shaifulbd123@gmail.com',
            'phone' => '0167008888',
            'address' => 'Dhaka',
            'password' => Hash::make('shaifulbd123@gmail.com'),
        ]);



        Theme::insert([
            'site_title' => "Our News Portal"
        ]);

        Social::insert([
            'facebook' => ''
        ]);
    }
}
