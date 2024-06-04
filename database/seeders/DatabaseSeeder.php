<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);


        $this->call([
            Student::class,
            StudentRecord::class,
            Fee::class,
            Professor::class,
            Classes::class,
            Grade::class,
            StudentRequest::class,
            Document::class,
            StudentViolation::class,
            Semester::class,
            Event::class,
        ]);
    }
}
