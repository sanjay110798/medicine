<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TblOrder extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_order', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->length(11);
            $table->string('bill_id', 55)->nullable();
            $table->decimal('total_price',10,2)->nullable();
            $table->string('payment_type', 55)->nullable();
            $table->string('prescription_image', 255)->nullable();
            $table->string('name', 115)->nullable();
            $table->string('company_name', 115)->nullable();
            $table->string('country', 15)->nullable();
            $table->string('state', 15)->nullable();
            $table->string('city', 15)->nullable();
            $table->string('address', 255)->nullable();
            $table->string('pincode', 15)->nullable();
            $table->string('phone', 15)->nullable();
            $table->string('email', 155)->nullable();
            $table->enum('status', ['0', '1', '2','3']);
            $table->longtext('first_comment')->nullable();
            $table->longtext('second_comment')->nullable();
            $table->longtext('third_comment')->nullable();
            $table->longtext('four_comment')->nullable();
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
        Schema::dropIfExists('tbl_order');
    }
}
