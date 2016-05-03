<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomerTypeVatTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer_type_vat', function (Blueprint $table) {
            $table->integer('customer_type_id')->unsigned();
            $table->integer('vat_id')->unsigned();

            $table->unique([
                'customer_type_id',
                'vat_id'
            ], 'customer_type_vat_unique');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('customer_type_vat');
    }
}
