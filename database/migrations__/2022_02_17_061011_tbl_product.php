<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TblProduct extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
   public function up()
    {
        Schema::create('tbl_product', function (Blueprint $table) {
            $table->id();
            $table->string('uni_code', 55)->nullable();
            $table->string('category_id', 55)->nullable();
            $table->string('brand_id', 55)->nullable();
            $table->string('sub_cat_id', 55)->nullable();
            $table->longText('product_name')->nullable();
            $table->string('manufacturer', 155)->nullable();
            $table->longText('composition')->nullable();
            $table->longtext('description')->nullable();
            $table->decimal('mrp',10,2)->nullable();
            $table->string('discount_type', 55)->nullable();
            $table->string('discount_value', 15)->nullable();
            $table->string('slug', 255)->nullable();
            $table->enum('prescription', ['Y', 'N']);
            $table->integer('active')->length(11);
            $table->text('barcode')->nullable();
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
        Schema::dropIfExists('tbl_product');
    }
}
