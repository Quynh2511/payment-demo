<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableDurationPromotion extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('duration_promotion', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->timestamp('begin');
            $table->timestamp('end');
            $table->integer('product_id');
            $table->float('percentage');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('duration_promotion');
    }
}
