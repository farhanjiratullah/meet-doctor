<?php

namespace Database\Seeders;

use App\Models\TypeUser;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TypeUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $type_users = [
            [
                'name' => 'Admin',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Dokter',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Pasien',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        TypeUser::insert($type_users);
    }
}
