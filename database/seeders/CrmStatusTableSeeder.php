<?php

namespace Database\Seeders;

use App\Models\CrmStatus;
use Illuminate\Database\Seeder;

class CrmStatusTableSeeder extends Seeder
{
    public function run()
    {
        $crmStatuses = [
            [
                'id'         => 1,
                'name'       => 'Lead',
                'created_at' => '2022-11-12 18:37:56',
                'updated_at' => '2022-11-12 18:37:56',
            ],
            [
                'id'         => 2,
                'name'       => 'Customer',
                'created_at' => '2022-11-12 18:37:56',
                'updated_at' => '2022-11-12 18:37:56',
            ],
            [
                'id'         => 3,
                'name'       => 'Partner',
                'created_at' => '2022-11-12 18:37:56',
                'updated_at' => '2022-11-12 18:37:56',
            ],
        ];

        CrmStatus::insert($crmStatuses);
    }
}
