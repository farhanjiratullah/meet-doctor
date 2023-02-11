<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            [
                'name'      => 'management_access',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name'      => 'master_data_access',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name'      => 'operational_access',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // dashboard
            [
                'name'      => 'dashboard_access',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // user
            [
                'name'      => 'user_access',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name'      => 'user_table',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name'      => 'user_create',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name'      => 'user_edit',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name'      => 'user_show',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name'      => 'user_delete',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // permission
            [
                'name'      => 'permission_access',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name'      => 'permission_table',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // role
            [
                'name'      => 'role_access',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name'      => 'role_table',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name'      => 'role_create',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name'      => 'role_edit',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name'      => 'role_show',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name'      => 'role_delete',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // type user
            [
                'name'      => 'type_user_access',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name'      => 'type_user_table',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // specialist
            [
                'name'      => 'specialist_access',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name'      => 'specialist_table',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name'      => 'specialist_create',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name'      => 'specialist_edit',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name'      => 'specialist_show',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name'      => 'specialist_delete',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // consultation
            [
                'name'      => 'consultation_access',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name'      => 'consultation_table',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name'      => 'consultation_create',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name'      => 'consultation_edit',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name'      => 'consultation_show',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name'      => 'consultation_delete',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // config payment
            [
                'name'      => 'config_payment_access',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name'      => 'config_payment_table',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name'      => 'config_payment_edit',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // doctor
            [
                'name'      => 'doctor_access',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name'      => 'doctor_table',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name'      => 'doctor_create',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name'      => 'doctor_edit',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name'      => 'doctor_show',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name'      => 'doctor_delete',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // hospital patient
            [
                'name'      => 'hospital_patient_access',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name'      => 'hospital_patient_table',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // appointment
            [
                'name'      => 'appointment_access',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name'      => 'appointment_table',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name'      => 'appointment_show',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name'      => 'appointment_export',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // transaction
            [
                'name'      => 'transaction_access',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name'      => 'transaction_table',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name'      => 'transaction_show',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name'      => 'transaction_export',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        Permission::insert($permissions);
    }
}
