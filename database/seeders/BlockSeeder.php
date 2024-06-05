<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BlockSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('blocks')->insert([
            // // 2023-2024, Term 2
            // [
            //     'block_id' => 'B1',
            //     'year_level' => 3,
            //     'section' => 2,
            //     'program_id' => 24, 
            //     'aysem_id' => 118,  
            //     'created_at' => now(),
            //     'updated_at' => now(),
            // ],
            // 2023-2024, Term 1
            [
                'block_id' => 'B2',
                'year_level' => 3,
                'section' => 2,
                'program_id' => 24,
                'aysem_id' => 117,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // 2022-2023, Term 2
            [
                'block_id' => 'B3',
                'year_level' => 3,
                'section' => 2,
                'program_id' => 24, 
                'aysem_id' => 116,  
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // 2022-2023, Term 1
            [
                'block_id' => 'B4',
                'year_level' => 3,
                'section' => 2,
                'program_id' => 24,
                'aysem_id' => 115,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // // 2021-2022, Term 2
            // [
            //     'block_id' => 'B5',
            //     'year_level' => 3,
            //     'section' => 2,
            //     'program_id' => 24,
            //     'aysem_id' => 117,
            //     'created_at' => now(),
            //     'updated_at' => now(),
            // ],
            // // 2021-2022, Term 1
            // [
            //     'block_id' => 'B6',
            //     'year_level' => 3,
            //     'section' => 2,
            //     'program_id' => 24,
            //     'aysem_id' => 117,
            //     'created_at' => now(),
            //     'updated_at' => now(),
            // ],
            // // 2020-2021, Term 2
            // [
            //     'block_id' => 'B7',
            //     'year_level' => 3,
            //     'section' => 2,
            //     'program_id' => 24,
            //     'aysem_id' => 117,
            //     'created_at' => now(),
            //     'updated_at' => now(),
            // ],
        ]);
    }
}
