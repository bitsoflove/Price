<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToProductVersionPricesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('product_version_prices', function(Blueprint $table)
		{
			$table->foreign('price_id', 'product_version_prices_price_id')->references('id')->on('prices')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('product_version_id', 'product_version_prices_product_version_id')->references('id')->on('product_version')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('product_version_prices', function(Blueprint $table)
		{
			$table->dropForeign('product_version_prices_price_id');
			$table->dropForeign('product_version_prices_product_version_id');
		});
	}

}
