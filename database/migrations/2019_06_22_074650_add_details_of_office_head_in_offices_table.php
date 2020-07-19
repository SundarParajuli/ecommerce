<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDetailsOfOfficeHeadInOfficesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     public function up()
    {
        Schema::table('offices', function (Blueprint $table) {
            $table->string('established_date')->nullable();
            $table->string('address')->nullable();
            $table->bigInteger('phone_number')->nullable();
            $table->bigInteger('fax_number')->nullable();
            $table->string('email')->nullable();
            $table->bigInteger('office_head_number')->nullable(); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('offices', function (Blueprint $table) {
            $table->dropColumn(['established_date','address','phone_number','fax_number','email','office_head_number']);
        });
    }
}
