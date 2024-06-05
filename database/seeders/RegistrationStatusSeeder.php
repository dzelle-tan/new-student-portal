<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RegistrationStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $registrationStatuses = ['Regular', 'Irregular', 'Graduated'];

        foreach ($registrationStatuses as $registrationStatus) {
            \App\Models\RegistrationStatus::create([
                'registration_status' => $registrationStatus,
            ]);
        }
    }
}
