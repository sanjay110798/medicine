<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->integer('role_id')->length(11)->nullable();
            $table->string('image', 255)->nullable();
            $table->string('name', 155)->nullable();
            $table->string('email', 155)->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('mobile', 55)->nullable();
            $table->integer('enabled')->length(11);
            $table->date('dob')->nullable();
            $table->string('gender', 255)->nullable();
            $table->string('blood_group', 255)->nullable();
            $table->string('height_ft', 255)->nullable();
            $table->string('height_inc', 255)->nullable();
            $table->string('weight', 255)->nullable();
            $table->string('marital_status', 255)->nullable();
            $table->string('e_number', 255)->nullable();
            $table->longtext('api_token')->nullable();
            $table->string('bill_name', 255)->nullable();
            $table->string('company_name', 255)->nullable();
            $table->string('country', 255)->nullable();
            $table->string('state', 255)->nullable();
            $table->string('city', 255)->nullable();
            $table->string('address', 255)->nullable();
            $table->string('pincode', 255)->nullable();
            $table->string('bill_phone', 255)->nullable();
            $table->string('bill_email', 255)->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
