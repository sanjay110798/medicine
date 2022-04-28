<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ShippingAddress extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shipping_address', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->length(11);
            $table->string('billing_name', 255)->nullable();
            $table->string('billing_company_name', 155)->nullable();
            $table->string('billing_country', 255)->nullable();
            $table->string('billing_state', 255)->nullable();
            $table->string('billing_city', 255)->nullable();
            $table->string('billing_address', 255)->nullable();
            $table->string('billing_pincode', 255)->nullable();
            $table->string('billing_phone', 255)->nullable();
            $table->string('billing_email', 255)->nullable();
            $table->string('default', 255)->nullable();
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
        Schema::dropIfExists('shipping_address');
    }
}
