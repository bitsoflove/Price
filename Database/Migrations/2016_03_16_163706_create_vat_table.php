<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateVatTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vat', function (Blueprint $table) {
            $table->increments('id');
            $table->string('slug', 60)->unique('key_UNIQUE');
            $table->float('percentage', 10, 0);
            $table->string('locale', 20);
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
        Schema::drop('vat');
    }
}
