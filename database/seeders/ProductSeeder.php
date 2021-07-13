<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\setPrice;
use Faker\Factory as FakerFactory;
use DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = FakerFactory::create();
        for($i = 0; $i < 20; $i++){
            $data =[
                'name' => $faker->name,
                'quantity' =>rand(1,100),
                'price' =>rand(1,100),
                'category_id' =>rand(1,10),
                'image' => $faker->image,

            ];
            DB::table('products')->insert($data);
        }

    }
}
