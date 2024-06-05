<?php

namespace Database\Seeders;

use App\Models\StudentRequest;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StudentRequestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        StudentRequest::factory()->count(50)->create();
    }
}
