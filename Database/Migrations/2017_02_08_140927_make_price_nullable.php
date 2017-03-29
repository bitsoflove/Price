<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MakePriceNullable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $query = "ALTER TABLE prices MODIFY COLUMN price double null";
        \Illuminate\Support\Facades\DB::statement(\Illuminate\Support\Facades\DB::raw($query));
    }

}
