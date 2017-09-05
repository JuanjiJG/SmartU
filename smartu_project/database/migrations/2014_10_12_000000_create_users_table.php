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
            $table->string('first_name');
            $table->string('last_name');
            $table->string('username')->unique();
            $table->string('email')->unique();
            $table->string('password');
            // $table->text('biography')->nullable();
            // $table->string('website')->nullable();
            // $table->string('cif')->nullable();
            // $table->integer('points')->default(0);
            // $table->boolean('verified')->default(false);
            // $table->boolean('admin')->default(false);
            $table->string('avatar')->default('default.jpg');
            // $table->string('location')->nullable();
            // $table->integer('status_id')->unsigned()->index();
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
