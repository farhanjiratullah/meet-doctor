<?php

namespace Database\Seeders;

use App\Models\DetailUser;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DetailUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $detail_user = [
            [
                'user_id'        => 1,
                'type_user_id'   => 1,
                'contact'        => NULL,
                'address'        => NULL,
                'photo'          => NULL,
                'gender'         => NULL,
                'created_at'     => now(),
                'updated_at'     => now(),
            ],
        ];

        DetailUser::insert($detail_user);
    }
}
