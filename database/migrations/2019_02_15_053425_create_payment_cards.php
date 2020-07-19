<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentCards extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payment_cards', function (Blueprint $table) {
            $table->increments('id');

            $table->string('name', 50);
            $table->bigInteger('card_number',false);
            $table->integer('expiry_month', false);
            $table->string('expiry_year', 50);
            $table->string('security_code', 50)->comment('Last four security code');
            $table->boolean('blocked')->default(0);
            $table->integer('customer_id'); 
            
            $table->softDeletes();
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
        Schema::dropIfExists('payment_cards');
    }
}
