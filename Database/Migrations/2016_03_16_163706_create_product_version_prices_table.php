<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProductVersionPricesTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_version_prices', function (Blueprint $table) {
            $table->integer('product_version_id')->unsigned();
            $table->integer('price_id')->unsigned()->index('product_version_prices_price_id_idx');
            $table->primary(['product_version_id', 'price_id']);
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('product_version_prices');
    }
}
