<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class CustumersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $regiones = DB::table('region')->where("status","A")->pluck('id');
        $communes = DB::table('communes')->where("status","A")->pluck('id');
        $date = date("Y-m-d H:i:s");
        $faker = Faker::create();

        DB::table('custumers')->insert([
            'dni' => '123456',
            'id_reg' => $faker->randomElement($regiones),
            'id_com' => $faker->randomElement($communes),
            'email' => $faker->email(),
            'name' => $faker->name(),
            'last_name' => $faker->lastName(),
            'address' => $faker->address(),
            'date_reg' => $date
        ]);

        DB::table('custumers')->insert([
            'dni' => '133456',
            'id_reg' => $faker->randomElement($regiones),
            'id_com' => $faker->randomElement($communes),
            'email' => $faker->email(),
            'name' => $faker->name(),
            'last_name' => $faker->lastName(),
            'address' => $faker->address(),
            'date_reg' => $date
        ]);

        DB::table('custumers')->insert([
            'dni' => '1234567',
            'id_reg' => $faker->randomElement($regiones),
            'id_com' => $faker->randomElement($communes),
            'email' => $faker->email(),
            'name' => $faker->name(),
            'last_name' => $faker->lastName(),
            'address' => $faker->address(),
            'date_reg' => $date
        ]);
    }
}
