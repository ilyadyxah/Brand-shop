<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carts', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')
                ->unsigned()
                ->nullable(true)
                ->default(null);
            $table->bigInteger('option_id')
                ->unsigned()
                ->nullable(true)
                ->default(null);
            $table->bigInteger('item_id')
                ->unsigned()
                ->nullable(true)
                ->default(null);
            $table->bigInteger('size_id')
                ->unsigned()
                ->nullable(true)
                ->default(null);
            $table->bigInteger('color_id')
                ->unsigned()
                ->nullable(true)
                ->default(null);
            $table->Integer('price')
                ->unsigned()
                ->nullable(true)
                ->default(null);
            $table->integer('quantity')
                ->unsigned()
                ->default(1);
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
        Schema::table('carts', function (Blueprint $table) {
            $table->dropForeign('carts_item_id_foreign');
            $table->dropForeign('carts_size_id_foreign');
        });
        Schema::dropIfExists('carts');
    }
}
