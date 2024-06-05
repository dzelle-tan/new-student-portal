<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BlockSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $blocks = [
            [
                'block_id' => 'A1',
                'year_level' => 1,
                'section' => 1,
                'program_id' => 1,
                'aysem_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'block_id' => 'B1',
                'year_level' => 2,
                'section' => 1,
                'program_id' => 1,
                'aysem_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        foreach ($blocks as $block) {
            \App\Models\Block::create($block);
        }
    }
}
