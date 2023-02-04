<?php

namespace Database\Seeders;

use App\Models\ConfigPayment;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ConfigPaymentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ConfigPayment::create([
            'fee' => '150000',
            'vat' => '20'
        ]);
    }
}
