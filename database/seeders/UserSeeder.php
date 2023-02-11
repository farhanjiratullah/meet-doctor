<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = [
            [
                'name'           => 'Super Admin',
                'email'          => 'admin@gmail.com',
                'password'       => Hash::make('googleplaystore'),
                'remember_token' => null,
                'created_at'     => now(),
                'updated_at'     => now(),
            ],
        ];

        User::insert($user);
    }
}
