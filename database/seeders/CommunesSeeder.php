<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Faker\Factory as Faker;

class CommunesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $regiones = DB::table('region')->where("status","A")->pluck('id');
        $date = date("Y-m-d H:i:s");
        $faker = Faker::create();

        DB::table('communes')->insert([
            'id_reg' => $faker->randomElement($regiones),
            'description' => Str::random(20),
            'created_at' => $date
        ]);

        DB::table('communes')->insert([
            'id_reg' => $faker->randomElement($regiones),
            'description' => Str::random(20),
            'created_at' => $date
        ]);

        DB::table('communes')->insert([
            'id_reg' => $faker->randomElement($regiones),
            'description' => Str::random(20),
            'created_at' => $date
        ]);
    }
}
