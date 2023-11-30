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
            'last_name' => 'binalla',
            'first_name' => 'merlin',
            'middle_name' => 'crtz',
            'pronouns' => 'she/her',
            'plm_email' => 'mcbinalla2021@plm.edu.ph'
        ]);

         DB::table('professors')->insert([
            'last_name' => 'Grande',
            'first_name' => 'Ariana',
            'middle_name' => 'Slay',
            'pronouns' => 'she/her',
            'plm_email' => 'mcbinalla2021@plm.edu.ph'
        ]);

         DB::table('professors')->insert([
            'last_name' => 'Bae',
            'first_name' => 'Joo-hyun',
            'middle_name' => 'Irene',
            'pronouns' => 'she/her',
            'plm_email' => 'mcbinalla2021@plm.edu.ph'
        ]);

         DB::table('professors')->insert([
            'last_name' => 'Kang',
            'first_name' => 'Seul',
            'middle_name' => 'Gi',
            'pronouns' => 'di sure',
            'plm_email' => 'mcbinalla2021@plm.edu.ph'
        ]);
    }
}
