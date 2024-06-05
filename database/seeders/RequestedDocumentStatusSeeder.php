<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RequestedDocumentStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $requestedDocumentStatuses = ['Pending', 'Ready'];

        foreach ($requestedDocumentStatuses as $requestedDocumentStatus) {
            \App\Models\RequestedDocumentStatus::create([
                'status' => $requestedDocumentStatus,
            ]);
        }
    }
}
