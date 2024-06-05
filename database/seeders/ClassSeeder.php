<?php

namespace Database\Seeders;

use App\Models\Classes;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClassSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $classes = [
            [
                'students_qty' => 30,
                'credited_units' => 3,
                'actual_units' => 3,
                'slots' => 35,
                'nstp_activity' => '',
                'parent_class_code' => 'CSC 0315',
                'link_type' => 'Lecture',
                'instruction_language' => 'English',
                'minimum_year_level' => 1,
                'teams_assigned_link' => 'http://example.com/team1',
                'effectivity_dateSL' => '2024-01-15',
                'course_id' => 7,
                'aysem_id' => 117,
                'block_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'students_qty' => 25,
                'credited_units' => 4,
                'actual_units' => 4,
                'slots' => 30,
                'nstp_activity' => '',
                'parent_class_code' => 'CSC 0315.1',
                'link_type' => 'Lab',
                'instruction_language' => 'English',
                'minimum_year_level' => 2,
                'teams_assigned_link' => 'http://example.com/team2',
                'effectivity_dateSL' => '2024-01-20',
                'course_id' => 8,
                'aysem_id' => 117,
                'block_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'students_qty' => 25,
                'credited_units' => 4,
                'actual_units' => 4,
                'slots' => 30,
                'nstp_activity' => '',
                'parent_class_code' => 'CSC 0311',
                'link_type' => 'Lab',
                'instruction_language' => 'English',
                'minimum_year_level' => 2,
                'teams_assigned_link' => 'http://example.com/team2',
                'effectivity_dateSL' => '2024-01-20',
                'course_id' => 9,
                'aysem_id' => 116,
                'block_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'students_qty' => 30,
                'credited_units' => 3,
                'actual_units' => 3,
                'slots' => 35,
                'nstp_activity' => '',
                'parent_class_code' => 'CSC 0312',
                'link_type' => 'Lecture',
                'instruction_language' => 'English',
                'minimum_year_level' => 1,
                'teams_assigned_link' => 'http://example.com/team1',
                'effectivity_dateSL' => '2024-01-15',
                'course_id' => 10,
                'aysem_id' => 117,
                'block_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'students_qty' => 25,
                'credited_units' => 4,
                'actual_units' => 4,
                'slots' => 30,
                'nstp_activity' => '',
                'parent_class_code' => 'CSC 0312.1',
                'link_type' => 'Lab',
                'instruction_language' => 'English',
                'minimum_year_level' => 2,
                'teams_assigned_link' => 'http://example.com/team2',
                'effectivity_dateSL' => '2024-01-20',
                'course_id' => 11,
                'aysem_id' => 117,
                'block_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'students_qty' => 30,
                'credited_units' => 3,
                'actual_units' => 3,
                'slots' => 35,
                'nstp_activity' => '',
                'parent_class_code' => 'CSC 0313',
                'link_type' => 'Lecture',
                'instruction_language' => 'English',
                'minimum_year_level' => 1,
                'teams_assigned_link' => 'http://example.com/team1',
                'effectivity_dateSL' => '2024-01-15',
                'course_id' => 12,
                'aysem_id' => 116,
                'block_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'students_qty' => 25,
                'credited_units' => 4,
                'actual_units' => 4,
                'slots' => 30,
                'nstp_activity' => '',
                'parent_class_code' => 'CSC 0313',
                'link_type' => 'Lab',
                'instruction_language' => 'English',
                'minimum_year_level' => 2,
                'teams_assigned_link' => 'http://example.com/team2',
                'effectivity_dateSL' => '2024-01-20',
                'course_id' => 13,
                'aysem_id' => 116,
                'block_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            
        ];

        foreach ($classes as $class) {
            Classes::create($class);
        }
    }
}
