<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('client_id')->unsigned();
            $table->foreign('client_id')->references('id')->on('users')->onDelete('cascade');
            $table->integer('bike_id')->unsigned();
            $table->foreign('bike_id')->references('id')->on('bikes')->onDelete('cascade');
            $table->integer('available_bo')->default('1')->nullable();
            $table->string('status')->default('Menunggu verifikasi')->nullable();
            $table->string('booking_code');
            $table->date('order_date');
            $table->integer('duration');
            $table->date('return_date_supposed');
            $table->date('return_date')->nullable();
            $table->integer('fine')->nullable();
            $table->integer('total_price')->nullable();
            $table->string('photo')->nullable();
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
        Schema::dropIfExists('bookings');
    }
}
