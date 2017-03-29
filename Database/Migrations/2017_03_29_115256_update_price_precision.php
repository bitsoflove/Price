<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdatePricePrecision extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        $sql = "ALTER TABLE prices MODIFY COLUMN price DECIMAL(18,10)";
        \DB::statement($sql);
    }
}
