<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToPriceTypeVatTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('price_type_vat', function (Blueprint $table) {
            $table->foreign('country_id', 'fk_price_type_vat_country_id')
                ->references('id')
                ->on('countries')
                ->onUpdate('NO ACTION')
                ->onDelete('NO ACTION');
            $table->foreign('price_type_id', 'fk_price_type_vat_price_types1')
                ->references('id')
                ->on('price_types')
                ->onUpdate('NO ACTION')
                ->onDelete('NO ACTION');
            $table->foreign('vat_id', 'fk_price_type_vat_vat1')
                ->references('id')
                ->on('vat')
                ->onUpdate('NO ACTION')
                ->onDelete('NO ACTION');
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('price_type_vat', function (Blueprint $table) {
            $table->dropForeign('fk_price_type_vat_country_id');
            $table->dropForeign('fk_price_type_vat_price_types1');
            $table->dropForeign('fk_price_type_vat_vat1');
        });
    }
}
