<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemsColorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items_colors', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('item_id');
            $table->unsignedBigInteger('color_id');
            $table->timestamps();
            $table->foreign('item_id')
                ->references('id')
                ->on('items')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
            $table->foreign('color_id')
                ->references('id')
                ->on('colors')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('items_colors', function (Blueprint $table) {
            $table->dropForeign(['item_id']);
            $table->dropForeign(['color_id']);
            $table->dropIfExists('items_colors');
        });
    }
}
