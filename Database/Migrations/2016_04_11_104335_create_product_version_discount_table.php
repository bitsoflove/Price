<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProductVersionDiscountTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('product_version_discount', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('product_version_id')->unsigned()->unique('product_version_id_UNIQUE');
            $table->enum('discount_type', array('percentage', 'number'))->default('number');
            $table->float('amount', 10, 0);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::drop('product_version_discount');
    }
}
