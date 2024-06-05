<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClassFacultySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $classFaculties = [
            [
                'class_id' => 1, 
                'instructor_id' => 2, 
            ],
            [
                'class_id' => 2, 
                'instructor_id' => 3, 
            ],
            [
                'class_id' => 3, 
                'instructor_id' => 3, 
            ],
            [
                'class_id' => 4, 
                'instructor_id' => 4, 
            ],
            [
                'class_id' => 5, 
                'instructor_id' => 4, 
            ],            
        ];

        foreach ($classFaculties as $classFaculty) {
            \DB::table('class_faculty')->insert($classFaculty);
        }        
    }
}
