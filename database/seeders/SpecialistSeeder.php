<?php

namespace Database\Seeders;

use App\Models\Specialist;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SpecialistSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $specialists = [
            [
                'name' => 'Dermatology',
                'price' => '150000',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Neurology',
                'price' => '250000',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Dentist',
                'price' => '125000',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Allergists',
                'price' => '100000',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Cardiologists',
                'price' => '300000',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        Specialist::insert($specialists);
    }
}
