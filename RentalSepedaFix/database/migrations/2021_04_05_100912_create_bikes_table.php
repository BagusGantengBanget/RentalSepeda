<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBikesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bikes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('merk_id')->unsigned();
            $table->foreign('merk_id')->references('id')->on('merks')->onDelete('cascade');
            $table->string('bike_name', 100);
            $table->string('bike_number', 10);
            $table->integer('price');
            $table->string('photo');
            $table->Integer('available')->default('1');
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
        Schema::dropIfExists('bikes');
    }
}
