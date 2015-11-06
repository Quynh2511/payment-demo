<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterBillItemTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('bill_items', function (Blueprint $table) {
            $table->dropColumn('name');
            $table->dropColumn('price');
            $table->integer('productId');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('bill_items', function (Blueprint $table) {
            $table->string('name');
            $table->float('price');
            $table->dropColumn('productId');
        });
    }
}
