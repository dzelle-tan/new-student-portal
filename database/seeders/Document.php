<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class Document extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('documents')->insert([
            'student_request_id' => 3,
            'document_name' => 'Graduates from SY 2017-2018 and onwards: CAV for Board Document Set (CTC Tagalog diploma, CTC English diploma, CTC TOR, Cert of graduation, CAV Certification)',
            'amount' => 1168.00,
            'no_of_copies' => 2,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('documents')->insert([
            'student_request_id' => 1,
            'document_name' => 'Certification of Grades',
            'amount' => 146.00,
            'no_of_copies' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('documents')->insert([
            'student_request_id' => 2,
            'document_name' => 'Certification of Grades with GWA',
            'amount' => 438.00,
            'no_of_copies' => 3,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('documents')->insert([
            'student_request_id' => 5,
            'document_name' => 'Certification of Graduation w/ Honor',
            'amount' => 292.00,
            'no_of_copies' => 2,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('documents')->insert([
            'student_request_id' => 4,
            'document_name' => 'NSTP/ROTC Certification',
            'amount' => 146.00,
            'no_of_copies' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

    }
}
