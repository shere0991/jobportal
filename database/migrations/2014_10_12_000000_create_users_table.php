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
            $table->string('FirstName')->nullable();
            $table->string('LastName')->nullable();
            $table->text('Photo')->nullable();
            $table->text('CV')->nullable();
            $table->string('Username');
            $table->string('email')->unique();
            $table->string('Phone')->nullable();
            $table->string('Education')->nullable();
            $table->string('Institution')->nullable();
            $table->string('Company')->nullable();
            $table->string('Possition')->nullable();
            $table->text('Experience')->nullable();
            $table->string('TotalYearsExperience')->nullable();
            $table->string('password');
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
