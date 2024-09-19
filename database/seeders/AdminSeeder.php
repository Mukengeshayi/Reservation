<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (User::where('email', 'admin@gmail.com')->doesntExist()) {
            User::create([
                'name' => 'Admin',
                'firstname' => 'Admin',
                'email' => 'admin@gmail.com',
                'password' => Hash::make('admin1234'),
                'role' => 'admin',
            ]);
        }
    }

}
