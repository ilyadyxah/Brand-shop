<?php

namespace Database\Seeders;

use App\Models\Items;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OptionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i < 12; $i++) {
            for ($j = 1; $j < 5; $j++) {
                for ($k = 1; $k < 4; $k++) {
                    DB::table('options')
                        ->insertOrIgnore([
                            'item_id' => $i,
                            'size_id' => $j,
                            'color_id' => $k,
                            'impact_price' => Items::query()->where('id', 1)->value('price') * (94 + $j*3)/100 * (94 + $k*3)/100,
                        ]);
                }
            }
        }
    }
}
