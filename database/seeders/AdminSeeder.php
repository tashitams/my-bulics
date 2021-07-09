<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    public function run()
    {
        Admin::create([
            'name' => 'Demo Admin',
            'username' => 'admin',
            'password' => 'admin@123',
        ]);     
    }
}