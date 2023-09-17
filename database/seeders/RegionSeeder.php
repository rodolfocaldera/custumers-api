<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class RegionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $date = date("Y-m-d H:i:s");
        DB::table('region')->insert([
            'description' => Str::random(20),
            'created_at' => $date
        ]);

        DB::table('region')->insert([
            'description' => Str::random(20),
            'created_at' => $date
        ]);

        DB::table('region')->insert([
            'description' => Str::random(20),
            'created_at' => $date
        ]);
    }
}
