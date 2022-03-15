<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('name', 128)
                ->unique()
                ->nullable(false);
            $table->timestamps();
        });

        Schema::table('items', function (Blueprint $table) {
        $table->bigInteger('category_id')
            ->nullable(true)
            ->default(null)
            ->unsigned()
            ->index();
        $table->foreign('category_id')
            ->references('id')
            ->on('categories');
        });

        DB::table('categories')
            ->insertOrIgnore([
                [
                    'name' => 'Accessories',
                    'created_at' => now()
                ],
                [
                    'name' => 'Bags',
                    'created_at' => now()
                ],
                [
                    'name' => 'Denim',
                    'created_at' => now()
                ],
                [
                    'name' => 'Hoodies and Sweatshirts',
                    'created_at' => now()
                ],
                [
                    'name' => 'Jackets and Coats',
                    'created_at' => now()
                ],
                [
                    'name' => 'Polos',
                    'created_at' => now()
                ],
                [
                    'name' => 'Shirts',
                    'created_at' => now()
                ],
                [
                    'name' => 'Shoes',
                    'created_at' => now()
                ],
                [
                    'name' => 'Sweaters and Knits',
                    'created_at' => now()
                ],
                [
                    'name' => 'T-Shirts',
                    'created_at' => now()
                ],
                [
                    'name' => 'Tanks',
                    'created_at' => now()
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
        Schema::table('items', function (Blueprint $table) {
            $table->dropForeign('items_category_id_foreign');
        });
        Schema::dropColumns('items', ['category_id']);
        Schema::dropIfExists('categories');
    }
}
