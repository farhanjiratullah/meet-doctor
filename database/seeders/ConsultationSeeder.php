<?php

namespace Database\Seeders;

use App\Models\Consultation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ConsultationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $consultations = [
            [
                'name' => 'Jantung Sesak',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Tekanan Darah Tinggi',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Gangguan Irama Jantung',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        Consultation::insert($consultations);
    }
}
