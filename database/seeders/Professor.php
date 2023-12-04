<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class Professor extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         DB::table('professors')->insert([
            'last_name' => 'Blanco',
            'first_name' => 'Mark Christopher',
            'middle_name' => 'Rodriguez',
            'pronouns' => 'he/him',
            'plm_email' => 'mcrblanco@plm.edu.ph'
        ]);

         DB::table('professors')->insert([
            'last_name' => 'Agustin',
            'first_name' => 'Vivien',
            'middle_name' => 'A',
            'pronouns' => 'she/her',
            'plm_email' => 'vaagustin@plm.edu.ph'
        ]);

         DB::table('professors')->insert([
            'last_name' => 'Cruz',
            'first_name' => 'Joel',
            'middle_name' => 'H',
            'pronouns' => 'he/him',
            'plm_email' => 'jhcruz@plm.edu.ph'
        ]);

         DB::table('professors')->insert([
            'last_name' => 'Dioses',
            'first_name' => 'Raymund',
            'middle_name' => 'M',
            'pronouns' => 'he/him',
            'plm_email' => 'rmdioses@plm.edu.ph'
        ]);
    }
}
