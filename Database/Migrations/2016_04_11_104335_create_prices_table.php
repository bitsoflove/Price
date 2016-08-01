<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePricesTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('prices', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('price_type_id')->unsigned()->index('fk_prices_price_types1_idx');
            $table->integer('currency_id')->unsigned()->index('fk_prices_currencies1_idx');
            $table->integer('unit_id')->unsigned()->index('fk_prices_units1_idx');
            $table->string('locale', 10)->nullable();
            $table->integer('price');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::drop('prices');
    }
}
