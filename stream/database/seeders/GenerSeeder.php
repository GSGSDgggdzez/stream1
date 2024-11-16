<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class GenerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $geners = [
            ['name' => 'Action'],
            ['name' => 'Comedy'],
            ['name' => 'Drama'],
            ['name' => 'Horror'],
            ['name' => 'Romance'],
            ['name' => 'Thriller'],
            ['name' => 'Science Fiction'],
            ['name' => 'Fantasy'],
            ['name' => 'Documentary'],
            ['name' => 'Animation']
        ];

        DB::table('geners')->insert($geners);
    }
}
