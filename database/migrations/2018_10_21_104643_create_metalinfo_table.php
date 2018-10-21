<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMetalinfoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('metalinfo', function (Blueprint $table) {
            $table->increments('id');
            $table->string('product_code');
            $table->string('metal_type');
            $table->double('metal_weight', 8, 2);
            $table->string('color');
            $table->string('clarity');
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
        Schema::dropIfExists('metalinfo');
    }
}
