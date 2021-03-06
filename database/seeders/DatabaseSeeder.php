<?php

namespace Database\Seeders;

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
        Admin::insert([
            'name' => 'Super Admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('password'),
            'image' => '',
        ]);

        // \App\Models\User::factory(10)->create();
        Theme::insert([
            'site_title' => "Our News Portal"
        ]);

        Social::insert([
            'facebook' => ''
        ]);
    }
}
