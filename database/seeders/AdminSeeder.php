<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;    
use Illuminate\Support\Facades\Hash;
class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Haris Butt',
            'email' => 'admin123@gmail.com',
            'password' => Hash::make('admin00'), // use a secure password
            'role' => 'admin',
        ]);
    }
}
