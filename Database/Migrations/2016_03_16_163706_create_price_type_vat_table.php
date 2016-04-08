<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePriceTypeVatTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('price_type_vat', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('price_type_id')->unsigned()->index('fk_price_type_vat_price_types1_idx');
            $table->integer('vat_id')->unsigned()->index('fk_price_type_vat_vat1_idx');
            $table->integer('country_id')->unsigned()->index('fk_price_type_vat_country_id_idx');
            $table->unique([
                'price_type_id',
                'vat_id',
                'country_id',
            ]);
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('price_type_vat');
    }
}
