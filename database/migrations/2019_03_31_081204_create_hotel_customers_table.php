<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHotelCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hotel_customers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('Name');
            $table->string('Address');
            $table->string('Members');
            $table->string('Phone');
            $table->string('status')->default(1);
            $table->string('Checkin_date');
            $table->string('Checkout_date');
            $table->string('Staying');
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
        Schema::dropIfExists('hotel_customers');
    }
}
