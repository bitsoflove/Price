<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePricesTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prices', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('price_type_id')->unsigned()->index('fk_prices_price_types1_idx');
            $table->integer('price');
            $table->integer('currency_id')->unsigned()->index('fk_prices_currencies1_idx');
            $table->integer('unit_id')->unsigned()->index('fk_prices_units1_idx');
            $table->string('locale', 20)->nullable();
            $table->timestamps();
            $table->dateTime('deleted_at')->default('0000-00-00 00:00:00');
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('prices');
    }
}
