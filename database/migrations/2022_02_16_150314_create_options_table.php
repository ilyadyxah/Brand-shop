<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('options', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('item_id')
                ->nullable(true)
                ->default(null)
                ->unsigned()
                ->index();
            $table->bigInteger('size_id')
                ->nullable(true)
                ->default(null)
                ->unsigned()
                ->index();
            $table->bigInteger('color_id')
                ->nullable(true)
                ->default(null)
                ->unsigned()
                ->index();
            $table->integer('impact_price');
            $table->timestamps();
            $table->foreign('item_id')
                ->references('id')
                ->on('items');
            $table->foreign('size_id')
                ->references('id')
                ->on('sizes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('options', function (Blueprint $table) {
            $table->dropForeign('options_item_id_foreign');
            $table->dropForeign('options_size_id_foreign');
        });
        Schema::dropIfExists('options');
    }
}
