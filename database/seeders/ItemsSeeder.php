<?php

namespace Database\Seeders;

use Faker\Generator;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ItemsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Generator $generator)
    {
        for ($i = 1; $i < 12; $i++) {
            DB::table('items')
                ->insertOrIgnore([
                    'title' => $generator->text(20),
                    'content' => $generator->text(300),
                    'price' => rand(1, 250),
                    'image' => "image/product-$i.png",
                    'gender' => rand(1,3),
                    'category_id' => rand(1, 12),
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
        }
    }
}
