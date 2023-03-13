<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Admin::create([
            'username' => 'Admin1',
            'firstname' => 'Admin',
            'lastname' => 'Administrator',
            'email' => 'admin@admin.com',
            'password' => bcrypt('password'),
            'address' => 'Dynamo street 22',
            'phone' => '1-234-5678-9012',
            'city' => 'Brighton',
            'country' => 'United States',
            'postal' => '234-555-789',
            'about' => 'I am an administrator...'
        ]);
    }
}
