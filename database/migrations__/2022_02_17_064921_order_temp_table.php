<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class OrderTempTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_temp_table', function (Blueprint $table) {
            $table->id();
            $table->string('order_id',155)->nullable();
            $table->string('product_id', 255)->nullable();
            $table->decimal('price',10,2)->nullable();
            $table->string('qty', 155)->nullable();
            $table->decimal('total_price',10,2)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_temp_table');
    }
}
