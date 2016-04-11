<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToProductVersionDiscountTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('product_version_discount', function(Blueprint $table)
		{
			$table->foreign('product_version_id', 'product_version_discount_product_version_id')->references('id')->on('product_version')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('product_version_discount', function(Blueprint $table)
		{
			$table->dropForeign('product_version_discount_product_version_id');
		});
	}

}
