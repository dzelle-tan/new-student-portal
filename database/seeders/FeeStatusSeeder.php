<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FeeStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $feeStatuses = ['Paid', 'Unpaid'];

        foreach ($feeStatuses as $feeStatus) {
            \App\Models\FeeStatus::create([
                'fee_status' => $feeStatus,
            ]);
        }
    }
}
