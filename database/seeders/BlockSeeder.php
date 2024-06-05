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
            [
                'block_id' => 'B1',
                'year_level' => 1,
                'section' => 1,
                'program_id' => 24, 
                'aysem_id' => 118,  
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'block_id' => 'B2',
                'year_level' => 2,
                'section' => 1,
                'program_id' => 24,
                'aysem_id' => 117,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
