<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->string('name'); 
            $table->string('email')->unique();
            $table->enum('gender', ['pria', 'wanita']);
            $table->date('birthday')->default (now());
            $table->string('phone')->default('-');
            $table->text('address')->default('-');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('level')->default('user');
            $table->rememberToken();
            $table->timestamps();
            /* $table->string('slug'); */
            /* $table->string('username')->unique(); */
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
