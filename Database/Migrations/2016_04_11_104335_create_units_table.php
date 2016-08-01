<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUnitsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('units', function (Blueprint $table) {
            $table->increments('id');
            $table->float('quantity', 10, 0)->default(1);
            $table->string('unit')->default('piece');
            $table->timestamps();
            $table->softDeletes();
            $table->unique(['quantity', 'unit'], 'quanity_unit_unique');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::drop('units');
    }
}
