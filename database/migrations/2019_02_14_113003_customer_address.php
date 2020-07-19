<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CustomerAddress extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer_addresses', function (Blueprint $table) {

            $table->increments('id');

            $table->string('customer_id');
            $table->string('name');
            $table->text('address');
            $table->text('address_2')->nullable();  
            $table->integer('zip_code')->nullable();
            $table->string('email',80)->nullable();
            $table->string('office_phone',80)->nullable();
            $table->string('home_phone',80)->nullable();
            $table->string('mobile',80)->nullable();

            $table->boolean('is_primary')->default(0);
            $table->integer('country_id')->nullable();
            $table->string('detail')->nullable();
            $table->integer('district_id')->nullable();
            $table->string('city', 100)->nullable(); 

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
        Schema::dropIfExists('customer_addresses');
    }
}
