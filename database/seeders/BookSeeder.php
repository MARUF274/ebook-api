<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use DB;
use Illuminate\Support\Str;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');
        for ($i=1; $i <= 10 ; $i++) { 
            DB::table('book')->insert([
                'title' => Str::random(10),
                'description' => Str::random(10),
                'author' => Str::random(10),
                'publisher' => Str::random(10),
                'date_of_issue' => "07:50:22"
            ]);
        }
    }
}
