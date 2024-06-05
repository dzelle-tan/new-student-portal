<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StudentRequestStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $studentRequestStatuses = ['Pending', 'Ready', 'Claimed'];

        foreach ($studentRequestStatuses as $studentRequestStatus) {
            \App\Models\StudentRequestStatus::create([
                'status' => $studentRequestStatus,
            ]);
        }
    }
}
