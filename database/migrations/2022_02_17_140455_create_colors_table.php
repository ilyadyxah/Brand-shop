<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateColorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('colors', function (Blueprint $table) {
            $table->id();
            $table->string('name', 50);
        });
        Schema::table('options', function (Blueprint $table) {
            $table->foreign('color_id')
                ->references('id')
                ->on('colors');
        });
            Schema::table('carts', function (Blueprint $table) {
                $table->foreign('color_id')
                    ->references('id')
                    ->on('colors');
        });

        DB::table('colors')
            ->insertOrIgnore([
                [
                    'name' => 'Red',
                ],
                [
                    'name' => 'Blue',
                ],
                [
                    'name' => 'Yellow',
                ],
            ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('options', function (Blueprint $table) {
            $table->dropForeign('options_color_id_foreign');
        });

        Schema::table('carts', function (Blueprint $table) {
            $table->dropForeign('carts_color_id_foreign');
        });
        Schema::dropIfExists('colors');
    }
}
