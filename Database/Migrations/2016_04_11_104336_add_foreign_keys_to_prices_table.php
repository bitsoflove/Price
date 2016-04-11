<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToPricesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('prices', function(Blueprint $table)
		{
			$table->foreign('currency_id', 'fk_prices_currencies1')->references('id')->on('currencies')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('price_type_id', 'fk_prices_price_types1')->references('id')->on('price_types')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('unit_id', 'fk_prices_units1')->references('id')->on('units')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('prices', function(Blueprint $table)
		{
			$table->dropForeign('fk_prices_currencies1');
			$table->dropForeign('fk_prices_price_types1');
			$table->dropForeign('fk_prices_units1');
		});
	}

}
