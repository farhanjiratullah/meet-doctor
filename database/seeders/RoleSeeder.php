<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            [
                'name'      => 'Super Admin', // 1
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name'      => 'Admin', // 2
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name'      => 'Staff Hospital', // 3
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name'      => 'Doctor', // 4
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name'      => 'Patient', // 5
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        Role::insert($roles);
    }
}
