<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductdimensionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productdimension', function (Blueprint $table) {
            $table->increments('id');
            $table->string('product_code');
            $table->double('width', 8, 2);
            $table->double('height', 8, 2);
            $table->double('weight', 8, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('productdimension');
    }
}
