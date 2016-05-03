<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignKeysToCustomerTypeVatTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('customer_type_vat', function (Blueprint $table) {
            $table->foreign('customer_type_id', 'customer_type_vat_customer_type_id')
                ->references('id')
                ->on('customer_types');

            $table->foreign('vat_id', 'customer_type_vat_vat_id')
                ->references('id')
                ->on('vat');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('customer_type_vat', function (Blueprint $table) {
            $table->dropForeign('customer_type_vat_customer_type_id');
            $table->dropForeign('customer_type_vat_vat_id');
        });
    }
}
