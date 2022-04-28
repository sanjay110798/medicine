<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CartTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
   public function up()
    {
        Schema::create('cart_table', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->length(11);
            $table->integer('product_id')->length(11);
            $table->decimal('price',10,2)->nullable();
            $table->string('quantity',255)->nullable();
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
        Schema::dropIfExists('cart_table');
    }
}
