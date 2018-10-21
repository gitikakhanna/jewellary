<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('category');
            $table->string('subcategory');
            $table->string('product_code');
            $table->string('product_name');
            $table->integer('price');
            $table->integer('discount');
            $table->string('description');
            $table->integer('item_package_qty');
            $table->string('gender');
            $table->timestamps();
        });
        Schema::table('products', function($table){
            $table->boolean('availability');
            $table->string('image');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
        Schema::table('products', function($table){
            $table->dropColumn('availability');
            $table->dropColumn('image');
        });
    }
}
